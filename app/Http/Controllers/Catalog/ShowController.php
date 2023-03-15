<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Resources\Post\PostResourse;
use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return new PostResourse($post);
        //return view('catalog.show', compact('post'));
    }
}
