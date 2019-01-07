<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inwards extends Model
{
    protected $fillable = [
        'letter_id', 'from_office', 'date','comment', 'worksheet_id'
    ];

    public function Letter(){
        return $this -> belongsTo('App\Letters');
    }

    public function Worksheet(){
        return $this -> belongsToMany('App\Worksheets');
    }
}
