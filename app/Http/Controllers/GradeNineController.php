<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeNineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard/9th_grade/9th_grade');
    }
}
