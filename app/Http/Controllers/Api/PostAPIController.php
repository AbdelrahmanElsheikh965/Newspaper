<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::with('comments')->get());         // Eager loading   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('post_image')) {
            Helper::saveImage($request->file('post_image'));
            $request->merge(['image' => $request->file('post_image')->getClientOriginalName()]);
            $created = Post::create($request->except('post_image', 'tags'));
            $postTags = explode(",", $request->tags);
            foreach ($postTags as $tag) {
                $created->attachTag($tag);
            }
        } else {
            $request->merge(['image' => 'cbmw.jpg']);
            $created = Post::create($request->except('post_image', 'tags'));
            $postTags = explode(",", $request->tags);
            foreach ($postTags as $tag) {
                $created->attachTag($tag);
            }
        }

        return response()->json([
            'Message' => 'Done, Post is created'
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        // return "Asd";
        // $this->authorize('update', $post);

        if ($request->file('post_image')) {
            Helper::saveImage($request->file('post_image'));
            $request->merge(['image' => $request->file('post_image')->getClientOriginalName()]);
            $post->update($request->except('post_image'));
            return response(
                [
                    'Message' => 'Post updated',
                ],
                Response::HTTP_OK
            );
        }

        $updated = $post->update($request->except('post_image'));

        return ($updated) ? response(
            ['Message' => 'Post updated'],
        ) : response()->json([
            'Message' => 'Error Check Your Data'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        dd($post);
        // $post = Post::find($id);
        // $this->authorize('delete', $post);
        // $post->delete();
        // Helper::deleteImage($post->image);
        // return response()->json([
        //     'Message' => 'Done, Post is deleted'
        // ], Response::HTTP_OK);
    }
}
