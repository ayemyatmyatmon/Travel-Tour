<?php

namespace App;

use App\Package;
use Illuminate\Database\Eloquent\Model;

class Day_By_Day_Package extends Model
{
    protected $guarded=[];

    public function package(){
        return $this->belongsTo(Package::class,'package_id','id');
    }
    public function image_path(){
        if($this->image){
            return asset('storage/day-by-day/'.$this->image);

        }
    }
}
