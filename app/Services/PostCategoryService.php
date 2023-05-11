<?php

namespace App\Services;

use App\Models\PostCategory;
use App\Http\Requests\PostCategory\StorePostCategoryRequest;
use App\Http\Requests\PostCategory\UpdatePostCategoryRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class PostCategoryService
 * @package App\Services
 */
class PostCategoryService
{
    private PostCategory $postCategory;

    public function __construct()
    {
        $this->postCategory = new PostCategory();
    }

    public function index()
    {
        try {
            $posts = $this->postCategory->query()->with('user', 'posts');

            return $posts;
        } catch (Exception $e) {
        }
    }


    public function store(StorePostCategoryRequest $request)
    {
        DB::begintransaction();
        try {
            $data = $request->validated();

            $data['user_id'] = auth()->id();

            $postCategories = $this->postCategory->create($data);
            DB::commit();

            return $postCategories;
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            Log::emergency($e->getMessage());
        }
    }


    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $postCategory->update($data);
            DB::commit();

            return $postCategory;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function delete(PostCategory $postCategory)
    {
        DB::beginTransaction();
        try {
            $postCategory->delete();
            DB::commit();

            return $postCategory;
        } catch (Exception $e) {
        }
    }
}
