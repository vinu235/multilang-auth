<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worksheets extends Model
{
    protected $fillable = [
        'user_id', 'total_inward', 'total_outward','total_accepted', 'total_rejected', 'total_awaiting'
    ];

    public function User(){
        return $this -> belongsTo('App\User');
    }
    
    public function Inwards(){
        return $this -> hasMany('App\Inwards');
    }
}
