<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            if (isset($item['imya']) && $item['imya'] != null){
                Post::firstOrCreate([
                    'title' => $item['imya'],
                ],[
                    'title' => $item['imya'],
                    'content' => $item['kontent'],
                    'image' => $item['kartinka'],
                    'likes' => $item['laiki'],
                    'is_published' => $item['publikaciya'],
                    'category_id' => $item['kategoriya']
                ]);
            }
        }
    }
}
