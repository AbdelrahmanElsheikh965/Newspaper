<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public $posts = [
        ['id' => 1, 'title' => 'test_1', 'body' => 'asda', 'image' => 'asdas'],
        ['id' => 2, 'title' => 'test_2', 'body' => 'asda', 'image' => 'asdas'],
        ['id' => 3, 'title' => 'test_3', 'body' => 'asda', 'image' => 'asdas'],
        ['id' => 4, 'title' => 'asdas', 'body' => 'asda', 'image' => 'asdas'],
        ['id' => 5, 'title' => 'asdas', 'body' => 'asda', 'image' => 'asdas'],
        ['id' => 6, 'title' => 'asdas', 'body' => 'asda', 'image' => 'asdas'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', $this->posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        $post = $this->posts[$id];
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
