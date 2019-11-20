<?php


namespace App\Http\Controllers;


use Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ConsideredapplicationController
{
    public function index(){
        if(!Auth::check())
            return redirect('/login');
        else{

            $users = DB::table('users')
                ->join('cards','cards.id','=','users.id_card')
                ->join('commissions','commissions.id','=','cards.commission_id')
                ->join('departments', 'departments.id', '=', 'users.department')
                ->join('directions', 'directions.id', '=', 'users.direction')
                ->select('users.*','users.id AS id_student','users.name AS name_student',
                    'users.lastname AS lastname_student','departments.name AS name_department','directions.name AS name_direction',
                    'cards.promoter AS promoter','cards.userPromoter AS userPromoter',
                    'cards.deanery AS deanery','cards.liblary AS liblary','cards.dormitory AS dormitory',
                    'cards.commission_id AS user_commission_id','commissions.workerSekretarz As worker_commission_id',
                    'commissions.id As commission_id','users.id_card AS id_card')
                ->get();

        return view('worker.consideredapplication',["userlist"=>$users]);
        }
    }

    public function updateResetDeanery($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['deanery' => 'W trakcie']);

        return redirect()->action('ConsideredapplicationController@index');
    }

    public function updateResetLiblary($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['liblary' => 'W trakcie']);

        return redirect()->action('ConsideredapplicationController@index');
    }

    public function updateResetDormitory($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['dormitory' => 'W trakcie']);

        return redirect()->action('ConsideredapplicationController@index');
    }

    public function updateResetPromoter($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['promoter' => 'W trakcie']);

        return redirect()->action('ConsideredapplicationController@index');
    }

}