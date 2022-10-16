<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class ShowController extends BaseController
{
    public function show(Post $post)
    {
        return new PostResource($post);
        //return view('post.show', compact('post'));
    }
}
