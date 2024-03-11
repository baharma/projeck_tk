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
                'slug' => 'kegiatan'
            ],
            [
                'name' => 'Prestasi',
                'slug' => 'prestasi'
            ],
            [
                'name' => 'Fasilitas',
                'slug' => 'fasilitas'
            ],
            [
                'name' => 'Pengumuman',
                'slug' => 'pengumuman'
            ],
        ];

        foreach ($data as $category) {
            Category::create($category);
        }

        // Category::factory(20)->create();


    }
}
