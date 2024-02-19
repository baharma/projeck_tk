<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Kegiatan',
                'slug' => null
            ],
            [
                'name' => 'Prestasi',
                'slug' => null
            ],
            [
                'name' => 'Fasilitas',
                'slug' => null
            ],
            [
                'name' => 'Pengumuman',
                'slug' => null
            ],
        ];

        foreach ($data as $category) {
            Category::create($category);
        }

        // Category::factory(20)->create();


    }
}
