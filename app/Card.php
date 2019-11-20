<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Card extends Model
{
     protected $fillable = [
        'liblary','dormitory','deanery','promoter'
    ];

    public function aboutdormitory(){
        return $this->belongsTo(Card::class, 'dormitory');
    }

    public function aboutliblary(){
        return $this->belongsTo(Card::class, 'liblary');
    }

    public function aboutdeanery(){
        return $this->belongsTo(Card::class, 'deanery');
    }
    public function aboutpromoter(){
        return $this->belongsTo(Card::class, 'promoter');
    }
}
