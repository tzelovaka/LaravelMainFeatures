<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Requests\Catalog\FilterRequest;
use App\Http\Resources\Post\PostResourse;
use App\Models\Post;
use App\Http\Filters\PostFilter;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {   
        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;
        $filter = app()->make(PostFilter::class, ['queryParams'=>array_filter($data)]);
        //$posts = Post::all();
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        return PostResourse::collection($posts); 
        //return view('catalog.index', compact('posts'));
    }
}
