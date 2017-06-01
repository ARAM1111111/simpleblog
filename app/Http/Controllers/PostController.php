<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Redirect;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('aaaa');
        //fetch 5 posts from db
        $posts = Posts::where('active',1)->orderBy('created_at','desc')->paginate(2);

        //page heading
        $title = "Latest Posts";

        // return our view home.blade.php
        // return view('home')->withPosts($posts)->withTitle($title);

         return view('home',compact('posts','title'));
    }

    public function showposts($id)
    {
        $posts = Posts::where('author_id',$id)->orderBy('created_at','desc')->get();
        // $a = $posts->first()
        // dd($posts->first()->author->name);
        return view('posts.showall',compact('posts'));
        //dd($author); 
    }

    public function indexDashboard(){
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post = Posts::where('slug',$id)->first();
       if(!$post){
            return redirect('/')->withErrors('PAGE NOT FAUND');
       }
       $comments=$post->comments;
       return view('posts.show',compact('post','comments')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
