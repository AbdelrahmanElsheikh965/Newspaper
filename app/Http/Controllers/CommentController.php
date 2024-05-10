<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Post $post, Request $request)
    {
        
        $usersIDS = User::pluck('id');

        $post->comments()->create([
            'body'=>$request->get('comment'),
            'writer_id'=> fake()->randomElement($usersIDS),
        ]);

        return redirect()->back();
    }

    public function getComments(Post $post)
    {
        // return new CommentResource($post->comments);
        return response()->json($post->comments);
    }

}
