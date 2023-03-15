<?php

namespace App\Http\Controllers\Catalog;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('catalog.create', compact('categories', 'tags'));
    }
}
