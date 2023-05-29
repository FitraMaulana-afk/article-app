<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;

class BusinesController extends Controller
{
    public $businesView = 'landing-page.bisnis.';

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

        $businesView = $this->businesView;

        return view($businesView.'index', \compact('posts'));
    }
}
