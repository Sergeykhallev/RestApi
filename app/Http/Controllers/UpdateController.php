<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function update(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();

        $post = $this->service->update($post, $data);

        return new PostResource($post);

        //return redirect()->route('post.show', $post->id);
    }
}