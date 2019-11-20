<?php


namespace App\Http\Controllers;

use App\Commission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class CommissionsController
{
    public function index(){

        if(!Auth::check())
            return redirect('/login');
        else{
        $userPrzewodniczacy = DB::table('commissions')
            ->join('users','commissions.workerPrzewodniczacy','=','users.id')
            ->select('users.*','users.id AS workerPrzewodniczacy_id','users.name AS workerPrzewodniczacy_name',
                'commissions.name AS commissionPrzewodniczacy_name','users.lastname AS workerPrzewodniczacy_lastname',
                'commissions.id AS commission_id')
            ->get();

        $userZastepca = DB::table('commissions')
            ->join('users','commissions.workerZastepca','=','users.id')
            ->select('users.*','users.id AS workerZastepca_id','users.name AS workerZastepca_name',
                'users.lastname AS workerZastepca_lastname','commissions.name AS commissionZastepca_name')
            ->get();

        $userSekretarz = DB::table('commissions')
            ->join('users','commissions.workerSekretarz','=','users.id')
            ->select('users.*','users.id AS workerSekretarz_id','users.name AS workerSekretarz_name',
                'users.lastname AS workerSekretarz_lastname','commissions.name AS commissionSekretarz_name')
            ->get();

        $userCzlonek = DB::table('commissions')
            ->join('users','commissions.workerCzlonek','=','users.id')
            ->select('users.*','users.id AS workerCzlonek_id','users.name AS workerCzlonek_name',
                'users.lastname AS workerCzlonek_lastname','commissions.name AS commissionCzlonek_name')
            ->get();

        return view('admin.commissions',[
            "userlistPrzewodniczacy"=>$userPrzewodniczacy,
            "userlistZastepca"=>$userZastepca,
            "userlistSekretarz"=>$userSekretarz,
            "userlistCzlonek"=>$userCzlonek]);
        }
    }

    public function create(UserRepository $userRepo){
        $workers = $userRepo->getAllWorkers();
        $commission = DB::table('Commissions')
            ->get();

        return view('admin.createcommission',["workers"=>$workers, "commissions"=>$commission]);
    }

    public function edit($id, UserRepository $userRepo){

        $commission = DB::table('commissions')
            ->join('users','commissions.workerPrzewodniczacy','=','users.id')
            ->where("commissions.id","$id")
            ->select('commissions.id AS commission_id')
            ->get();
        $worker = $userRepo->getAllWorkers();
        return view('admin.editcommission', ['commissionlist' => $commission,'workers'=>$worker]);
    }

    public function destroy($id){
        $commission  = Commission::find($id);
        $commission->delete();
        return redirect()->action('CommissionsController@index');
    }

    public function store()
    {
        $commission = new Commission;
        $commission->workerPrzewodniczacy =  Request('workerPrzewodniczacy');
        $commission->workerZastepca =  Request('workerZastepca');
        $commission->workerSekretarz =  Request('workerSekretarz');
        $commission->workerCzlonek =  Request('workerCzlonek');
        $commission->name =  Request('name');
        $commission->save();
        return redirect()->action('CommissionsController@index');
    }

    public function update($id, Request $request){
        $commission  = Commission::find($id);
        $commission->name = $request->input('name');
        $commission->workerPrzewodniczacy = $request->input('workerPrzewodniczacy');
        $commission->workerZastepca = $request->input('workerZastepca');
        $commission->workerSekretarz = $request->input('workerSekretarz');
        $commission->workerCzlonek = $request->input('workerCzlonek');
        $commission->save();
        return redirect()->action('CommissionsController@index');
    }

}

