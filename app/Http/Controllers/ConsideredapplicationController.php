<?php


namespace App\Http\Controllers;

use App\User;
use App\Card;
use App\Department;
use Request;
use App\Repositories\UserRepository;
use App\Repositories\CardRepository;
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
            ->join('commissions','commissions.workerPrzewodniczacy','=','commission_id')
            ->join('departments', 'departments.id', '=', 'users.department')
            ->join('directions', 'directions.id', '=', 'users.direction')
            ->select('users.*','users.id AS id_student','users.name AS name_student','commissions.workerPrzewodniczacy AS number_commission',
                'cards.commission_id AS commission_id','departments.name AS name_department','directions.name AS name_direction',
                'commissions.workerPrzewodniczacy AS usernumber_commission','users.lastname AS lastname_student',
                'cards.promoter AS promoter','cards.userPromoter AS userPromoter',
                'cards.deanery AS deanery','cards.liblary AS liblary','cards.dormitory AS dormitory')
            ->get();

        return view('worker.consideredapplication',["userlist"=>$users]);
        }
    }

}