<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;

class TeknologiController extends Controller
{
    public $teknologiView = 'landing-page.teknologi.';

    public PostService $postService;

    public function __construct()
    {
        $this->postService = new PostService;
    }

    public function index(Request $request)
    {
        $posts = $this->postService
            ->index($request)
            ->orderby('created_at', 'desc')->get();

        $teknologiView = $this->teknologiView;

        return view($teknologiView.'index', \compact('posts'));
    }
}
