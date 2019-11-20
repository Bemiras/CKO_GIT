<?php


namespace App\Http\Controllers;

use App\Card;
use App\User;
use App\Commission;
use Request;
use App\Repositories\CardRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CardController extends Controller
{
    public function index(){
        if(!Auth::check())
            return redirect('/login');
        else {
            $card = DB::table('Users')
                ->join('Cards', function ($join) {
                    $join->on('Users.id_card', '=', 'Cards.id')
                        ->where('Users.id_card', '=', Auth::user()->id_card);
                })
                ->get();

            $promoter = DB::table('Users')
                ->where('Users.specialization', '=', 'promotor')
                ->get();

            $commission = DB::table('Commissions')
                ->get();
            return view('student.card', ["cardlist" => $card, "promoters" => $promoter, "commissions" => $commission]);
        }
    }

    public function store(){
        
        DB::table('Cards')->insert(
        ['liblary' => 'W trakcie',
         'dormitory' => 'W trakcie',
         'deanery' => 'W trakcie',
         'promoter' => 'W trakcie',
        'commission_id' => Request('commission_id'),
        'userPromoter' => Request('promoter')
        ]);

        $card = DB::table('Cards')->max('id');

        DB::table('Users')
            ->where('id', (Auth::user()->id))
            ->update(['id_card' =>$card,
                      'card' => 'Rozpatrzenie']);

        return redirect()->action('CardController@index');
    }

    
}    
