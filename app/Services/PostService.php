<?php

namespace App\Services;

use App\Enums\PublishStatusEnum;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{
    public ?string $newImage = null;
    public ?string $oldImage = null;
    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index(Request $request)
    {
        try {
            $posts = $this->post->query()->with('user', 'category');

            $posts->when($request->routeIs('landing.index'), function ($query) {
                $query->where('status', PublishStatusEnum::status['PUBLISH']);
            });

            return $posts;
        } catch (Exception $e) {
        }
    }

    public function store(StorePostRequest $request)
    {
        DB::begintransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->newImage = $request->file('image')->store('posts/image', 'public');
                $data['image'] = $this->newImage;
            }
            $data['user_id'] = auth()->id();


            $posts = $this->post->create($data);
            DB::commit();

            return $posts;
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            Log::emergency($e->getMessage());
        }
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $this->oldImage = $post->image;
                $this->newImage = $request->file('image')->store('posts/image', 'public');
                $data['image'] = $this->newImage;
            }
            $data['user_id'] = auth()->id();
            $post->update($data);
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $post;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function delete(Post $post)
    {
        DB::beginTransaction();
        try {
            $this->oldImage = $post->image;
            $post->delete();
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $post;
        } catch (Exception $e) {
        }
    }
}
