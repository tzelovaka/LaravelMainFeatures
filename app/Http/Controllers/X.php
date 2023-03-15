<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('catalog.index', compact('posts'));
    }

    public function create()
    {  
        $categories = Category::all();
        $tags = Tag::all();
        return view('catalog.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tag()->attach($tags);

        return redirect()->route('cat.index');
    }

    public function show(Post $post)
    {
        return view('catalog.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('catalog.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title'=>'required|string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>''
        ]);
        
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post -> tag()->sync($tags);
        return redirect()->route('cat.show', $post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('cat.index');
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate()
    {
        $anotherpost = [
                'title' => 'Audi',
                'content' => 'A100',
                'image' => 'audi image',
                'likes' => 500,
                'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'Audi',
        ], [
            $anotherpost
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherpost = [
            'title' => 'Chevrolet',
            'content' => 'Camaro',
            'image' => 'CC image',
            'likes' => 300,
            'is_published' => 1,
    ];
        $post = Post::updateOrCreate([
            'title' => 'Daewu'
        ],$anotherpost);
        dump($post->content);
        dd('updateorcreate');
    }
    
}
