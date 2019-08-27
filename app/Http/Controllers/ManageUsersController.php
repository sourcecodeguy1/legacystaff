<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function index(){
        $url = "users";
        return view('users/manage_users')->with(['url' => $url]);
    }
}
