<?php

namespace App;

use App\Day;
use App\City;
use App\Level;
use App\BusType;
use App\BusOperator;
use Illuminate\Database\Eloquent\Model;

class Bus_Schedule extends Model
{
    public function bus_operator(){
        return $this->belongsTo(BusOperator::class,'bus_operator_id','id');
    }
    public function from_city(){
        return $this->belongsTo(City::class,'from_city_id','id');
    }

    public function to_city(){
        return $this->belongsTo(City::class,'to_city_id','id');
    }

    public function level(){
        return $this->belongsTo(Level::class,'level_id','id');
    }

    public function bus_type(){
        return $this->belongsTo(BusType::class,'bus_type_id','id');
    }

    public function day(){
        return $this->belongsTo(Day::class,'day_id','id');
    }


}
