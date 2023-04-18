<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function index($slug)
    {
        return view("layouts.");
    }
}
