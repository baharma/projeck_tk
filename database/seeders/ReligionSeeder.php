<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['name' => 'Islam'],
            ['name' => 'Kristen Protestan'],
            ['name' => 'Kristen Katolik'],
            ['name' => 'Hindu'],
            ['name' => 'Buddha'],
            ['name' => 'Konghuchu'],
        ];

        foreach ($datas as $data) {
            Religion::create($data);
        }
    }
}
