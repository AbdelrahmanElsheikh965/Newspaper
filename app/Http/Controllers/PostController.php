<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests\PostRequest;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with([
            'posts' => Post::paginate(9),
            'author' => User::first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with([
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd($request);
        if ($request->file('post_image')) {
            Helper::saveImage($request->file('post_image'));
            $request->merge(['image'=> $request->file('post_image')->getClientOriginalName()]);
            $created = Post::create($request->except('post_image'));
            
        }else{
            $request->merge(['image'=> 'cbmw.jpg']);
            $created = Post::create($request->except('post_image', 'tags'));
            // dd($created);
            $postTags = explode(",", $request->tags);
            foreach ($postTags as $tag) {
                $created->attachTag($tag);
            }
        }

        if ($created) {
            return redirect()->to('/posts');
        }

        return redirect()->to('/new-post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with([
            'post' => $post,
            'users' => User::all(),
        ]);
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
        $post = Post::find($id);
        $this->authorize('update', $post);

        if ($request->file('post_image')) {
            Helper::saveImage($request->file('post_image'));
            $request->merge(['image' => $request->file('post_image')->getClientOriginalName()]);
            $post->update($request->except('post_image'));
        }else{
            $post->update($request->except('post_image'));
        }

        return view('posts.post')->with('post', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('delete', $post);
        $post->delete();
        Helper::deleteImage($post->image);
        return redirect()->to('/posts');
    }
}
