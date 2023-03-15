<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ijpcommand extends Command
{

    protected $signature = 'import:jsonplaceholder';



    protected $description = 'Get data from json placeholder.';

    public function handle()
    {
        $import = new ImportDataClient();
        $response  = $import->client->request('GET', 'posts');
        $data=json_decode($response->getBody()->getContents());
        foreach ($data as $item) {
            Post::firstOrCreate([
                'title' => $item->title
            ],[
                'title' => $item->title,
                'content' => $item->body,
                'category_id' => 7
            ]);
        }
    }
}