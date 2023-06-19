<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public $sportView = 'landing-page.olahraga.';

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

        $sportView = $this->sportView;

        return view($sportView.'index', \compact('posts'));
    }
}
