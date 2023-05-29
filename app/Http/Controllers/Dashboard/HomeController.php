<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public PostService $postService;
    public function __construct()
    {
        $this->postService = new PostService;
    }
    public function __invoke(Request $request)
    {
        $posts = $this->postService
            ->index($request)
            ->count();

        return \view('dashboard.home.dashboard', \compact('posts'));
    }
}
