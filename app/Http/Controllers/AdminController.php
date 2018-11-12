<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posts;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin', array('users'=>User::all()->count(), 'posts'=>Posts::all()->count()));
    }
    public function indexPosts()
    {
        return view('admin.postsTable', array('posts'=>Posts::all(), 'users'=>User::all()));
    }
    public function indexUsers()
    {
        return view('admin.usersTable', array('users'=>User::all()));
    }
    public function indexMail()
    {
        return view('admin.mail');
    }
}
