<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('json/posts_202404022219.json');
        $dataGet = file_get_contents($dataJson);
        $data = json_decode($dataGet, true);
        foreach($data['posts'] as $item ){
            Post::create([
                "title" => $item['title'],
                "slug" => $item['slug'],
                "thumnail"=>$item['thumnail'],
                "article" => $item['article'],
                "status" => $item['status'],
            ]);
        }
    }
}
