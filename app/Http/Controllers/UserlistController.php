<?php


namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserlistController
{
    public function index()
    {
        if (!Auth::check())
            return redirect('/login');
        else {
            $users = DB::table('users')
                ->join('departments', 'departments.id', '=', 'users.department')
                ->join('directions', 'directions.id', '=', 'users.direction')
                ->where("role","student")
                ->select('users.*', 'users.name AS name_user', 'departments.name AS name_department', 'directions.name AS name_direction')
                ->get();
            return view('admin.userlist', ["userlist" => $users]);
        }
    }
}