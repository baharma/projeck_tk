<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::truncate();
        
        Company::create([
            'name' => 'TK Kemala Asri',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, tenetur! Accusamus, beatae obcaecati soluta consequatur placeat neque blanditiis perspiciatis. Sunt itaque dolore corporis officia, maiores vero iure placeat cumque saepe!',
            'address' => 'Jalan Kertapura Gang Segina',
            'logo' => null
        ]);
    }
}
