<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Requests\Catalog\StoreRequest;
use App\Http\Resources\Post\PostResourse;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $post=$this->service->store($data);
        return $post instanceof Post ? new PostResourse($post) : $post;
        //return redirect()->route('cat.index');
    }
}
