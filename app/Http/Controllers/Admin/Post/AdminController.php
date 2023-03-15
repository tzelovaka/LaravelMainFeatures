<?php

namespace App\Http\Controllers\Admin\Post;
use App\Http\Requests\Catalog\FilterRequest;
use App\Models\Post;
use App\Http\Filters\PostFilter;
use \App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request ->validated();

        $filter = app()->make(PostFilter::class, ['queryParams'=>array_filter($data)]);
        $posts = Post::filter($filter)->paginate(15);


        return view('admin.post.index', compact('posts'));
    }
}
