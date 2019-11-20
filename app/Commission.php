<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = [
        'id','name','workerPrzewodniczacy','workerZastepca','workerSekretarz','workerCzlonek',
    ];




    public function commissionPrzewodniczacy(){
        return $this->belongsTo(User::class,'workerPrzewodniczacy');

    }



}


