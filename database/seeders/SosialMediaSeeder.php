<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Facebook',
                'slug' => 'facebook',
                'url' => null,
            ],
            [
                'name' => 'Instagram',
                'slug' => 'instagram',
                'url' => null,
            ],
            [
                'name' => 'Whatsapp',
                'slug' => 'whatsapp',
                'url' => null,
            ],
        ];

        foreach ($datas as $data) {
            SocialMedia::create($data);
        }
    }
}
