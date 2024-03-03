<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::truncate();
        
        $datas = [
            [
                'name' => 'Facebook',
                'slug' => 'facebook',
                'url' => 'https://facebook.com',
            ],
            [
                'name' => 'Instagram',
                'slug' => 'instagram',
                'url' => 'https://instagram.com',
            ],
            [
                'name' => 'Whatsapp',
                'slug' => 'whatsapp',
                'url' => 'https://api.whatsapp.com',
            ],
        ];

        foreach ($datas as $data) {
            SocialMedia::create($data);
        }
    }
}
