<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Posts;
use Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.profile', array('user'=>Auth::user(), 'posts'=>Posts::orderBy('id', 'desc')->get()));
    }
    //\Storage::makeDirectory($data['name']);

    public function update_setting(Request $request){
        $date = $request->get('date');


        if(isset($data)){
      		$user->data = $request->get('date');
      		$user->save();
      	}

      	if($request->hasFile('avatar')){
      		$avatar = $request->file('avatar');
      		$filename = time() . '.' . $avatar->getClientOriginalExtension();
      		Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatars/' . $filename ) );
      		$user = Auth::user();
      		$user->avatar = $filename;
      		$user->save();
      	}
      	return view('user.profile', array('user' => Auth::user()) );
    }
}
