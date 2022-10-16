<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class StoreController extends BaseController
{
    public function store(StoreRequest $request, Post $post)
    {
        $data = $request->validated();

        $post = $this->service->store($data);

        return new PostResource($post);

        //return redirect()->route('post.index');
    }
}
