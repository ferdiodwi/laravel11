<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('home'); // Buat view ini di resources/views/user/dashboard.blade.php
    }
}
