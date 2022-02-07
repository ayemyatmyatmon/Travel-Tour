<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusOperator extends Model
{
    protected $casts=[
        'images'=>'array',
    ];


    public function logo_path(){
        return asset('storage/bus/logo/'.$this->logo);
    }

   


}
