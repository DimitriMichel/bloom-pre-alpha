<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
      /**
     * Get a listing of all Posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::all();

       return response()->json([
        'posts' => $posts,
       ]);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
       $post = Post::create($request->all());
       return response()->json([
        'message' => 'Post successfully created!',
        'post' => $post
       ], 201); 
    }

    /**
     * Display the specified Post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json([
            'message' => 'Post Found!',
            'post' => $post,
        ]);
    }

    /**
     * Update the specified Post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        return response()->json([
            'message' => 'Post updated sucessfully',
            'post' => $post,
        ], 200);
    }

    /**
     * Remove the specified Post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       $post->delete();
       return response()->json([
        'message' => 'Post deleted successfully'
       ], 204);
    }
}
