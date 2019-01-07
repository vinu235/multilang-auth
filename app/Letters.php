<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letters extends Model
{
    protected $fillable = [
        'letter_id','from_office', 'date', 'subject','type', 'status', 'file_path'
    ];

    public function Inward(){
        return $this -> hasOne('App\Inwards');
    }
}
