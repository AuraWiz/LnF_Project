<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostModel::all()->toArray();
        return view('post.managepost',compact('posts'));
    }

    /*Display on home page*/
    public function home()
    {
        $posts = PostModel::all()->toArray();
        return view('home',compact('posts'));
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
      $this->validate($request,['pic'=>'required','name'=>'required','ownername'=>'required','ownertel'=>'required']);

          $post = new PostModel([
          'user' => $request->get('user'),
          'url' => $request->file('pic')->store('img','public'),
          'name' => $request->get('name'),
          'gender' => $request->get('gender'),
          'info' => $request->get('info'),
          'owner' => $request->get('ownername'),
          'owner_info' => $request->get('ownertel'),

      ]);
      $post->save();
      return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $posts = PostModel::all()->toArray();
      return view('post.managepost',compact('posts'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PostModel::find($id);
        return view('post.editpost',compact('post','id'));
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
        $post = PostModel::find($id);
        $this->validate($request,['gender'=>'required','name'=>'required','ownername'=>'required','ownertel'=>'required']);

        $post->name = $request->get('name');
        $post->gender = $request->get('gender');
        $post->info = $request->get('info');
        $post->owner = $request->get('ownername');
        $post->owner_info = $request->get('ownertel');

        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PostModel::find($id);
        $file = $post->url;
        unlink('storage/' . $file);
        $post->delete();
        return redirect()->route('post.index');
    }
}
