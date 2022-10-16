<?php


namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class Service
{
    public function store($data)
    {

        $tags = $data['tags'];
        $category = $data['category'];
        unset($data['tags'], $data['category']);

       /* if (!isset($category['id'])) {
            $category = Category::create($category);
        }*/

        foreach ($tags as $tag) {
            $tagIds = [];
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return $post;
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return $post->fresh();
    }
}
