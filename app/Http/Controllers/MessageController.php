<?php


namespace App\Http\Controllers;

use App\Message;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController
{
    public function index(){
        if(!Auth::check())
            return redirect('/login');
        else{

            $messageSender = DB::table('messages')
                ->join('users','messages.sender','=','users.id')
                ->select('messages.*','users.id AS messageSender_id','users.name AS messageSender_name',
                    'users.lastname AS messageSender_lastname','users.specialization AS messageSender_specialization',
                    'messages.created_at AS data')
                ->orderby('data','DESC')
                ->get();

        return view('message',['messagelistSender'=>$messageSender]);
        }
    }

    public function newMessage ($id, UserRepository $userRepo)
    {

        $worker = $userRepo->getAllWorkers();
        $user = DB::table('users')
            ->where("users.id","$id")
            ->select('users.*','users.name AS student_name','users.lastname AS student_lastname', 'users.id AS student_id')
            ->get();

        return view('newmessage',['userlist' => $user,'workers'=>$worker]);
    }
    public function sendMessage($id,Request $request)
    {
        $message = new  Message;
        $message->sender =  $request->input('sender');
        $message->recipient =  $request->input('recipient');
        $message->message =  $request->input('message');
        $message->save();


        return redirect()->action('MessageController@wyslane');

    }

    public function wyslane(){
        if(!Auth::check())
            return redirect('/login');
        else{

            $messageRecipient = DB::table('messages')
                ->join('users','messages.recipient','=','users.id')
                ->select('messages.*','users.id AS messageRecipient_id','users.name AS messageRecipient_name',
                    'users.lastname AS messageRecipient_lastname','users.specialization AS messageRecipient_specialization',
                    'messages.created_at AS data')
                ->orderby('data','DESC')
                ->get();

            return view('messageSend',['messagelistRecipient'=>$messageRecipient]);
        }
    }
}