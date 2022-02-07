<?php

namespace App\Http\Controllers\Backend;

use App\Package;
use Carbon\Carbon;
use App\Day_By_Day_Package;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StorePackage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PackageDetailController extends Controller
{

    public function index(){
        return view('backend.packagedetail.index');

    }

    public function ssd(){
        $packagedetails=Day_By_Day_Package::query();
        return Datatables::of($packagedetails)
        ->addColumn('action',function($each){
            $edit_icon='<a class="text-warning mr-1 icons" href="'.route('packagedetail.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
            $detail_icon='<a class="text-primary mr-1 icons" href="'.route('packagedetail.show',$each->id).'"><i class="fas fa-info-circle "></i></a>';
            $delete_icon='<a class=" Delete text-danger icons " href="#" data-id="'.$each->id.' "  style="font-size:18px; "><i class="fas fa-trash-alt"></i></a>';
            return '<div style="width:120px;" >'.$edit_icon.$detail_icon.$delete_icon.'</div>';
        })

        ->editColumn('image',function($each){
            return '<img style="width:100px;" src="'.$each->image_path().'" class="profile_thumpnail"><p class="my-1"> </p>';

        })
        ->editColumn('description',function($each){
            $description=Str::limit($each->description,'80');
            return $description;
        })
        ->editColumn('updated_at',function($each){
            $updated_at=Carbon::parse($each->updated_at)->format('Y-m-d ');
            return $updated_at;
        })
        ->editColumn('package_duration',function($each){
            $package_duration=$each->package ? $each->package->from_to_city : '';
            return $package_duration;
        })
        ->rawColumns(['image','package_duration','action'])
        ->make(true);

    }
    public function create(){
        $packages=Package::get();
        $packagedetails=Day_By_Day_Package::get();
        return view('backend.packagedetail.create',compact('packagedetails','packages'));
    }

    public function store(Request $request){
        $image_name=null;
        if($request->hasfile('image')){
            $image_file=$request->file('image');
            $image_name=uniqid().'.'.time().'.'.$image_file->getClientOriginalExtension();
            Storage::disk('public')->put('day-by-day/'.$image_name, file_get_contents($image_file));

        }
        $packagedetails=new Day_By_Day_Package;
        $packagedetails->package_id=$request->package_id;
        $packagedetails->title=$request->title;
        $packagedetails->description=$request->description;
        $packagedetails->image=$image_name;
        $packagedetails->save();
        return redirect(route('packagedetail.index'))->with('create','Package Created is successfully.');
    }

    public function edit($id){
        $packages=Package::get();

        $packagedetail=Day_By_Day_Package::findOrFail($id);
        return view('backend.packagedetail.edit',compact('packagedetail','packages'));
    }
    public function update($id,Request $request){
        $packagedetail=Day_By_Day_Package::findOrFail($id);

        $image_name=$packagedetail->image;
        if($request->hasfile('image')){
            Storage::disk('public')->delete('packagedetail/'.$image_name);

            $image_file=$request->file('image');
            $image_name=uniqid().'.'.time().'.'.$image_file->getClientOriginalExtension();
            Storage::disk('public')->put('day-by-day/'.$image_name, file_get_contents($image_file));

        }
        $packagedetail->package_id=$request->package_id;
        $packagedetail->title=$request->title;
        $packagedetail->description=$request->description;
        $packagedetail->image=$image_name;
        $packagedetail->update();
        return redirect(route('packagedetail.index'))->with('update','Package Updated is successfully.');
    }
    public function show($id){
        $packagedetail=Day_By_Day_Package::findOrFail($id);
        return view('backend.packagedetail.show',compact('packagedetail'));
    }
    public function destroy($id){
        $packagedetail=Day_By_Day_Package::findOrFail($id);
        $packagedetail->delete($id);
        return 'success';

    }

}
