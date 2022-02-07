<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function image_path(){
        if($this->image){
            return asset('storage/hotel/'.$this->image);
        }
    }

    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
}
