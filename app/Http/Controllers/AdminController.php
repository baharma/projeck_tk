<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\ParentStudent;
use App\Models\RegistrationStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function index(){
        $allSiswa = RegistrationStudent::all()->count();
        $pendingSiswa = RegistrationStudent::where('status','pending')->count();
        $validSiswa = RegistrationStudent::where('status','valid')->count();

        $dataSiswaTahunan = RegistrationStudent::select([DB::raw('year(created_at) as tahun' ) , DB::raw('count(id) as jumlah')])
                                                    ->where('status' , 'valid')
                                                    ->groupBy('tahun')
                                                    ->orderBy('tahun' , 'desc')
                                                    ->limit(5)
                                                    ->get()->toJson();

        

        $parent = $this->usiaOrangTua(date('Y-m-d'));
        $educationParent = $this->pendidikanOrangTua(date('Y-m-d'));


        return view('dashboard',compact('allSiswa','validSiswa','pendingSiswa' , 'dataSiswaTahunan' , 'parent' , 'educationParent'));
    }

    public function usiaOrangTua($tahun) {
        $parentMaxAge = ParentStudent::select([DB::raw('max(TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE())) AS max_age')])->first();
        $parentMinAge = ParentStudent::select([DB::raw('min(TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE())) AS min_age')])->first();
        $parentAvgAge = ParentStudent::select([DB::raw('avg(TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE())) AS avg_age')])->first();
        $parent = [
            'max_age_parent' => !is_null($parentMaxAge) ? $parentMaxAge->max_age : 0,
            'min_age_parent' => !is_null($parentMinAge) ? $parentMinAge->min_age : 0,
            'avg_age_parent' => !is_null($parentAvgAge) ? round($parentAvgAge->avg_age) : 0
        ];

        return $parent;
    }

    public function pendidikanOrangTua($tahun) {
        
        $educations = ParentStudent::select([
            'education.name',
            DB::raw('count(education.id) as jumlah')
        ])
        ->join('education' , 'education.id' , 'parents.education_id')
        ->orderBy('jumlah' , 'desc')
        ->groupBy('education.id')
        ->limit(5)
        ->get();

        return $educations;

    }
}
