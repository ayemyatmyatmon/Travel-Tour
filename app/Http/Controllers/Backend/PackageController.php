<?php

namespace App\Http\Controllers\Backend;

use App\Package;
use Carbon\Carbon;
use App\Day_By_Day_Package;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StorePackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePackage;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{

    public function index(){
        return view('backend.package.index');

    }

    public function ssd(){
        $packages=Package::query();
        return Datatables::of($packages)
        ->addColumn('action',function($each){
            $edit_icon='<a class="text-warning icons mr-2" href="'.route('package.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
            $delete_icon='<a class=" Delete  icons text-danger " href="#" data-id="'.$each->id.' "  style="font-size:18px; "><i class="fas fa-trash-alt"></i></a>';
            return '<div style="width:120px;">'.$edit_icon.$delete_icon.'</div>';
        })

        ->editColumn('amount',function($each){
            return number_format($each->amount);
        })

        ->editColumn('updated_at',function($each){
            $updated_at=Carbon::parse($each->updated_at)->format('Y-m-d ');
            return $updated_at;
        })
        ->rawColumns(['action'])
        ->make(true);

    }
    public function create(){
        $packages=Package::get();
        return view('backend.package.create',compact('packages'));
    }

    public function store(StorePackage $request){
        $packages=new Package;
        $image_name=null;
        if($request->hasfile('images')){
            $image_file=$request->file('images');
                $image_name=uniqid().'.'.time().'.'.$image_file->getClientOriginalExtension();
                Storage::disk('public')->put('package/'.$image_name, file_get_contents($image_file));


        }

        $packages->duration=$request->duration;
        $packages->person_quantity=$request->person_quantity;
        $packages->from_to_city=$request->from_to_city;
        $packages->amount=$request->amount;
        $packages->images=$image_name;

        $packages->save();
        return redirect(route('package.index'))->with('create','Package Created is successfully.');
    }

    public function edit($id){
        $package=Package::findOrFail($id);
        return view('backend.package.edit',compact('package'));
    }

    public function update($id,UpdatePackage $request){
        $package=Package::findOrFail($id);
        $image_name=$package->images;
        if($request->hasfile('images')){
            $image_file=$request->file('images');
                $image_name=uniqid().'.'.time().'.'.$image_file->getClientOriginalExtension();
                Storage::disk('public')->put('package/'.$image_name, file_get_contents($image_file));



        }



        $package->duration=$request->duration;
        $package->person_quantity=$request->person_quantity;
        $package->from_to_city=$request->from_to_city;
        $package->amount=$request->amount;
        $package->images=$image_name;
        $package->update();
        return redirect(route('package.index'))->with('update','Package Updated is successfully.');
    }
    public function destroy($id){
        $package=Package::findOrFail($id);
        $package->delete($id);
        return 'success';

    }

}
