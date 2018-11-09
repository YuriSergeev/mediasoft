<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Image;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Posts();

        $post->user_id = $request->get('user_id');
        $post->description = $request->get('description');
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1366, 768)->save(public_path('/storage/image/' . $filename));
        $post->image = $filename;
        $post->save();

        switch ($request->get('page')) {
          case 'news':
            return redirect()->route('news');
            break;

          default:
            return redirect()->route('profile');
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Posts::find($id);
      return view('user.show', array('user'=>Auth::user()))->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::find($id);

        $post->user_id = $request->get('user_id');
        $post->description = $request->get('description');
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('/storage/image/' . $filename));
            $post->image = $filename;
        }
        $post->save();

        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::find($id)->delete();
        return redirect()->route('profile');
    }
}
