<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyController extends BaseController
{
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
