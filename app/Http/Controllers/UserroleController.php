<?php


namespace App\Http\Controllers;


use App\Commission;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserroleController
{
    public function index(){
        if(!Auth::check())
            return redirect('/login');
        else {

         $workers = DB::table('users')
               ->join('departments', 'departments.id', '=', 'users.department')
               ->where("role","pracownik")
               ->select('users.*', 'users.name AS user_name', 'departments.name AS name_department'
                   ,'users.specialization AS user_specialization','users.id AS user_id','users.lastname AS user_lastname')
               ->get();

            return view('admin.userrole', ["workerlist" => $workers]);

        }
    }

    public function edit($id){
        $workers = DB::table('users')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->where("users.id","$id")
            ->select('users.*', 'users.name AS user_name', 'departments.name AS name_department'
                ,'users.specialization AS user_specialization','users.id AS user_id','users.lastname AS user_lastname')
            ->get();

        return view('admin.editrole', ['workerlist'=>$workers]);
    }


    public function update($id, Request $request){
        $worker  = User::find($id);
        $worker->specialization = $request->input('specialization');
        $worker->save();
        return redirect()->action('UserroleController@index');
        }

    public function showRegistrations(){
        return view('admin.employeeRegistrations');
    }

    public function regiserEmployee(Request $request){
        $data = new User();

        $data->name = $request->input('name');
        $data->lastname = $request->input('lastname');
        $data->email = $request -> input('email');
        $data->id = $request -> input('id');
        $data->department = $request->input('department');
        $data->password = bcrypt($request -> input('password'));
        $data->role = 'pracownik';
        $data->save();

        return redirect('userrole');
    }

}