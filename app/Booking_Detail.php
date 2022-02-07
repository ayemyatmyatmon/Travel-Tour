<?php

namespace App;

use App\Bus_Schedule;
use Illuminate\Database\Eloquent\Model;

class Booking_Detail extends Model
{
    protected $guarded=[];
    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id','id');
    }
    public function schedule(){
        return $this->belongsTo(Bus_Schedule::class,'schedule_id','id');
    }


}
