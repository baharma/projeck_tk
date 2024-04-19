<?php

namespace App\Http\Controllers;

use App\Models\RegistrationStudent;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index(){
        $allSiswa = RegistrationStudent::all()->count();
        $pendingSiswa = RegistrationStudent::where('status','pending')->count();
        $validSiswa = RegistrationStudent::where('status','valid')->count();

        return view('dashboard',compact('allSiswa','validSiswa','pendingSiswa'));
    }
}
