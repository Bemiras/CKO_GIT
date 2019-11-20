<?php


namespace App\Http\Controllers;

use App\Direction;
use Illuminate\Http\Request;
use App\Repositories\DirectionRepository;
use Illuminate\Support\Facades\Auth;


class DirectionofferController extends Controller
{
    public function index()
    {
        if (!Auth::check())
            return redirect('/login');
        else {

            $users = Direction::all()->sortBy('id');

            return view('admin.directionoffer', ["userlist" => $users]);
        }
    }

    public function store()
    {
        $directionoffer = new Direction;
        $directionoffer->id =  Request('id');
        $directionoffer->name =  Request('name');
        $directionoffer->save();
        return redirect()->action('DirectionofferController@index');
    }

    public function create(DirectionRepository $directionRepo){
        $direction = $directionRepo->getAllDirection();

        return view('admin.createdirection',["direction"=>$direction]);
    }

    public function edit($id, DirectionRepository $directionRepo){
        $direction  = Direction::find($id);
        $workers = $directionRepo->getAllDirection();
        return view('admin.editdirection', ['direction' => $direction]);
    }

    public function destroy($id){
        $direction  = Direction::find($id);
        $direction->delete();
        return redirect()->action('DirectionofferController@index');
        }

    public function update($id, Request $request){
        $direction  = Direction::find($id);
        $direction->name = $request->input('name');
        $direction->save();
        return redirect()->action('DirectionofferController@index');
    }
}