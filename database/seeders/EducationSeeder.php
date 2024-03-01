<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['name' => 'SD'],
            ['name' => 'SMP'],
            ['name' => 'SMA/SMK'],
            ['name' => 'D1'],
            ['name' => 'D2'],
            ['name' => 'D3'],
            ['name' => 'D4'],
            ['name' => 'Sarjana 1'],
            ['name' => 'Sarjana 2'],
            ['name' => 'Sarjana 3'],
        ];

        foreach($datas as $data)
        {
            Education::create($data);
        }
    }
}
