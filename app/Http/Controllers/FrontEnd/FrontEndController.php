<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function __construct()
    {

    }


    public function index(){
        return view('layouts.app-front-end');
    }
}
