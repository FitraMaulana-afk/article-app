<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeknologiController extends Controller
{
    public $teknologiView = 'landing-page.teknologi.';

    public function index()
    {
        $teknologiView = $this->teknologiView;
        return view($teknologiView . 'index');
    }
}
