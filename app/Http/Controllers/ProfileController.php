<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Posts;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile', array('user'=>Auth::user(), 'posts'=>Posts::all()));
    }
}
