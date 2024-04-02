<?php

namespace Database\Seeders;

use App\Models\RegistrationStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('json/registration_students_202404022218.json');
        $dataGet = file_get_contents($dataJson);
        $data = json_decode($dataGet, true);
        foreach($data['registration_students'] as $item ){
            RegistrationStudent::create([

                "name" =>$item['name'],
                "gender"=>$item['gender'],
                "date_of_birth" =>$item['date_of_birth'],
                "place_of_birth" =>$item['place_of_birth'],
                "religion_id" => $item['religion_id'],
                "address" =>$item['address'],
                "phone"=>$item['phone'],
                "number_of_siblings"=> $item['number_of_siblings'],
                "height" =>$item['height'],
                "weight"=>$item['weight'],
                "kk_image" =>$item['kk_image'],
                "akta_image"=>$item['akta_image'],
                "status" =>$item['status'],
            ]);
        }
    }
}
