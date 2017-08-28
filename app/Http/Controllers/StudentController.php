<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        return view('student.index');
    }
}
