<?php

namespace App\Http\Controllers\src\controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function professorIndex()
    {
        return view('layouts.professor.dashboard');
    }
}
