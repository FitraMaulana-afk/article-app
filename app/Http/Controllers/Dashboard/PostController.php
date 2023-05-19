<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\PostCategory;
use App\Services\PostService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public string $postView = 'dashboard.post.';
    public PostService $postService;

    public function __construct()
    {
        $this->postService = new PostService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $postView = $this->postView;
        $posts = $this->postService
            ->index($request)
            ->paginate(10);
        return \view($postView . 'index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::all();
        $postView = $this->postView;
        return \view($postView . 'create', \compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try {
            $post = $this->postService->store($request);

            return to_route('post.index', compact('post'));
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $postView = $this->postView;
        $categories = PostCategory::all();
        return view($postView . 'show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $postView = $this->postView;
        $categories = PostCategory::all();
        return view($postView . 'edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $post = $this->postService->update($request, $post);

            return to_route('post.index');
        } catch (Exception $e) {
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post = $this->postService->delete($post);

            return to_route('post.index');
        } catch (Exception $e) {
        }
    }
}