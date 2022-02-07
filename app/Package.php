<?php

namespace App;

use App\Day_By_Day_Package;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $cast=[
        'image'=>'array',
    ];
    public function packagedetail(){
        return $this->hasMany(Day_By_Day_Package::class,'package_id','id');
    }
    public function image_path(){
        if($this->image){
            return asset('storage/package/'.$this->image);
        }
    }
}
