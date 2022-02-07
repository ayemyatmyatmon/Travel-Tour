<?php

namespace App;

use App\Bus_Schedule;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guards = [];

    public function schedule()
    {
        return $this->belongsTo(Bus_Schedule::class, 'schedule_id', 'id');
    }
}
