<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostRelations extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('json/post_categories_202404041712.json');
        $dataGet = file_get_contents($dataJson);
        $data = json_decode($dataGet, true);
        foreach($data['post_categories'] as $item ){
            PostCategory::create([
                "id" => $item->id,
		        "post_id" => $item->post_id,
		        "category_id" => $item->category_id,
            ]);
        }
    }
}
