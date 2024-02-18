<?php

namespace App\Http\Controllers\src\controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex()
    {
        return view('layouts.admin.dashboard');
    }
}
