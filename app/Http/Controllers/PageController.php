<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function profile()
    {
        return view('profile-public');
    }

    public function about()
    {
        return view('about');
    }
}