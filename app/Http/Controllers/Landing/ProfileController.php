<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $profileView = 'landing-page.profile.';
    // public function index()
    // {
    //     $this->profileView = $profileView;
    //     return \view($profileView . 'index');
    // }

    public function edit()
    {
        $profileView = $this->profileView;
        return \view($profileView . 'index');
    }
}