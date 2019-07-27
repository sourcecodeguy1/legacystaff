<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeNineController extends Controller
{
    public function index(){
        return view('dashboard/9th_grade/9th_grade');
    }
}
