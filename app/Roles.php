<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'role',
    ];

    public function Users(){
        return $this -> hasMany('App\Users');
    }
}
