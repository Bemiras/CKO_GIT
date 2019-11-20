<?php


namespace App\Http\Controllers;

use Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PendingapplicationController
{
    public function index(){

        if(!Auth::check())
            return redirect('/login');
        else {
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
                    'commissions.id As commission_id')
                ->get();

            return view('worker.pendingapplication',["userlist"=>$users]);
        }
    }

    public function updateYesDeanery($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['deanery' => 'Zakonczona']);

        return redirect()->action('PendingapplicationController@index');
    }

    public function updateNoDeanery($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['deanery' => 'Niepowodzenie']);

        return redirect()->action('PendingapplicationController@index');
    }

    public function updateYesLiblary($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['liblary' => 'Zakonczona']);

        return redirect()->action('PendingapplicationController@index');
    }

    public function updateYesDormitory($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['dormitory' => 'Zakonczona']);

        return redirect()->action('PendingapplicationController@index');
    }

    public function updateYesPromoter($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['promoter' => 'Zakonczona']);

        return redirect()->action('PendingapplicationController@index');
    }


     public function updateNoLiblary($id)
    {
            DB::table('Cards')
            ->where('id', $id)
            ->update(['liblary' => 'Niepowodzenie']);

        return redirect()->action('PendingapplicationController@index');
    }

     public function updateNoDormitory($id)
    {

        DB::table('Cards')
            ->where('id', $id)
            ->update(['dormitory' => 'Niepowodzenie']);

        return redirect()->action('PendingapplicationController@index');
    }

    public function updateNoPromoter($id)
    {
        DB::table('Cards')
            ->where('id', $id)
            ->update(['promoter' => 'Niepowodzenie']);

        return redirect()->action('PendingapplicationController@index');
    }

    public function updateYesCard($id)
    {
            DB::table('Users')
            ->where('id', $id)
            ->update(['card' => 'W realizacji']);

        return redirect()->action('PendingapplicationController@index');
    }

     public function updateNoCard($id)
    {
        DB::table('Users')
            ->where('id', $id)
            ->update(['card' => 'Bledne dane']);
            
        DB::table('Cards')
            ->where('id', $id)
            ->delete();

        return redirect()->action('PendingapplicationController@index');
    }
}