<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Models\User;

class StudentController extends Controller
{
    public function index()
    {
        if (!Auth::check())
            return redirect('/login');
        else {
            return view('student.createstudent');
        }
    }
}
