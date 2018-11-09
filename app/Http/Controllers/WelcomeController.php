<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posts;
use Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', array('users'=>User::all(), 'posts'=>Posts::all()))->with('auth_user', Auth::user());
    }
}
