<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function index(){
        if(!Auth::check())
            return redirect('/login');
        else {
            return view('worker.createworker');
        }
    }
}
