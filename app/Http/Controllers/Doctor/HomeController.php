<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('doctor.home');
    }
}
