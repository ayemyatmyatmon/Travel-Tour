<?php

namespace App\Http\Controllers\Backend;

use App\City;
use App\Hotel;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreHotel;
use App\Http\Requests\UpdateHotel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{

    public function index(){
        return view('backend.hotel.index');

    }

    public function ssd(){
        $hotels=Hotel::query();
        return Datatables::of($hotels)
        ->addColumn('action',function($each){
            $edit_icon='<a class="text-warning icons mr-2" href="'.route('hotel.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
            $delete_icon='<a class=" Delete icons text-danger " href="#" data-id="'.$each->id.' "  style="font-size:18px; "><i class="fas fa-trash-alt"></i></a>';
            return '<div style="width:120px;">'.$edit_icon.$delete_icon.'</div>';
        })
        ->editColumn('image',function($each){
            return '<img style="width:100px;" src="'.$each->image_path().'" class="profile_thumpnail"><p class="my-1"> </p>';

        })
        ->editColumn('amount',function($each){
            return number_format($each->amount);
        })
        ->addColumn('town',function($each){
            return $each->cities ? $each->cities->name : '';
        })
        ->editColumn('updated_at',function($each){
            $updated_at=Carbon::parse($each->updated_at)->format('Y-m-d ');
            return $updated_at;
        })
        ->rawColumns(['image','action'])
        ->make(true);

    }
    public function create(){
        $cities=City::get();
        return view('backend.hotel.create',compact('cities'));
    }
    public function store(StoreHotel $request){
        $hotels=new Hotel;

        $image_name=null;
        if($request->hasfile('image')){
            $image_file=$request->file('image');
            $image_name=uniqid().'.'.time().'.'.$image_file->getClientOriginalExtension();
            Storage::disk('public')->put('hotel/'.$image_name, file_get_contents($image_file));

        }
        $hotels->name=$request->name;
        $hotels->city_id=$request->city_id;
        $hotels->day=$request->day;
        $hotels->person=$request->person;
        $hotels->amount=$request->amount;
        $hotels->image=$image_name;
        $hotels->save();
        return redirect(route('hotel.index'))->with('create','Hotels Created is successfully.');
    }

    public function edit($id){
        $hotel=Hotel::findOrFail($id);
        $cities=City::get();
        return view('backend.hotel.edit',compact('hotel','cities'));
    }
    public function update($id,UpdateHotel $request){
        $hotel=Hotel::findOrFail($id);
        $image_name=$hotel->image;
        if($request->hasfile('image')){
            Storage::disk('public')->delete('hotel/'.$image_name);
            $image_file=$request->file('image');
            $image_name=uniqid().'.'.time().'.'.$image_file->getClientOriginalExtension();
            Storage::disk('public')->put('hotel/'.$image_name, file_get_contents($image_file));

        }
        $hotel->name=$request->name;
        $hotel->city_id=$request->city_id;
        $hotel->day=$request->day;
        $hotel->person=$request->person;
        $hotel->amount=$request->amount;
        $hotel->image=$image_name;
        $hotel->update();
        return redirect(route('hotel.index'))->with('update','Hotels Updated is successfully.');
    }
    public function destroy($id){
        $hotel=Hotel::findOrFail($id);
        $hotel->delete($id);

        return 'success';

    }
}
