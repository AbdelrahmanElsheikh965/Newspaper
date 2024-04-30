<?php

namespace App\Http\Controllers;

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
    }

}
