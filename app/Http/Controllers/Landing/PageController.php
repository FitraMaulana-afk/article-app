<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public string $landingView = 'landing-page.home.';

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
        $landingView = $this->landingView;
        $posts = $this->postService->index($request)->orderby('created_at', 'desc')->get();
        return view($landingView . 'index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $landingView = $this->landingView;
        return view($landingView . 'show', \compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}