<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class NewsController
{
    public function index()
    {
        if (!Auth::check())
            return redirect('/login');
        else {
            return view('admin.news');
        }
    }
}