<?php

namespace App\Http\Controllers;

use App\Department;
use App\Direction;
use App\Levelstudy;
use App\Typestudy;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        if(!Auth::check()) {
            return redirect('/login');
        }
        else{
            $datadepartment = Department::select("name")->where('id', Auth::user()->department)->first();
            $datadirecrtion = Direction::select("name")->where('id', Auth::user()->direction)->first();
            $datalevelstudy = Levelstudy::select("name")->where('id', Auth::user()->levelstudy)->first();
            $datatypestudy = Typestudy::select("name")->where('id', Auth::user()->typestudy)->first();

            return view('about', ["datadepartment"=>$datadepartment, "datadirection"=>$datadirecrtion, "datalevelstudy"=>$datalevelstudy, "datatypestudy"=>$datatypestudy]);
        }
    }
}
