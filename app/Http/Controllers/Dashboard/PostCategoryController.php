<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategory\StorePostCategoryRequest;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Http\Requests\PostCategory\UpdatePostCategoryRequest;
use App\Services\PostCategoryService;
use Exception;
use Illuminate\Support\Facades\Log;

class PostCategoryController extends Controller
{
    public string $postCategoryView = 'dashboard.post-category.';

    public PostCategoryService $postCategoryService;

    public function __construct()
    {
        $this->postCategoryService = new PostCategoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postCategoryView = $this->postCategoryView;
        $postCategories = $this->postCategoryService->index()->paginate(10);
        return view($postCategoryView . 'index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postCategoryView = $this->postCategoryView;
        return view($postCategoryView . 'create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostCategoryRequest $request)
    {
        try {
            $postCategories = $this->postCategoryService->store($request);

            return to_route('post-category.index', compact('postCategories'));
        } catch (Exception $e) {
            dd($e);
            Log::emergency($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $postCategory)
    {
        $postCategoryView = $this->postCategoryView;
        return view($postCategoryView . 'show', compact('postCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {
        $postCategoryView = $this->postCategoryView;
        return view($postCategoryView . 'edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {
        try {
            $postCategories = $this->postCategoryService->update($request, $postCategory);

            return to_route('post-category.index', compact('postCategories'));
        } catch (Exception $e) {
            dd($e);
            Log::emergency($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {
        try {
            $this->postCategoryService->delete($postCategory);

            return to_route('post-category.index');
        } catch (Exception $e) {
        }
    }
}
