<?php


namespace App\Http\Controllers;

use App\Department;

use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DepartmentofferController extends Controller

{
    public function index()
    {
        if (!Auth::check())
            return redirect('/login');
        else {

            $users = Department::all()->sortBy('id');

            return view('admin.departmentoffer', ["userlist" => $users]);
        }
    }

    public function store()
    {
        $departmentoffer = new Department;
        $departmentoffer->id =  Request('id');
        $departmentoffer->name =  Request('name');
        $departmentoffer->save();
        return redirect()->action('DepartmentofferController@index');
    }

    public function create(DepartmentRepository $departmentRepo){
        $department = $departmentRepo->getAllDepartment();

        return view('admin.createdepartment',["department"=>$department]);
    }

    public function edit($id, DepartmentRepository $departmentRepo){
        $department  = Department::find($id);
        $workers = $departmentRepo->getAllDepartment();
        return view('admin.editdepartment', ['department' => $department]);
    }

    public function destroy($id){
        $department  = Department::find($id);
        $department->delete();
        return redirect()->action('DepartmentofferController@index');
        }
    
    public function update($id, Request $request){
        $department  = Department::find($id);
        $department->name = $request->input('name');
        $department->save();
        return redirect()->action('DepartmentofferController@index');
    }
}