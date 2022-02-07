<?php

namespace App\Http\Controllers\Backend;

use App\BusOperator;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCar;
use App\Http\Requests\UpdateCar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class BusOperatorController extends Controller
{

    public function index()
    {
        return view('backend.bus.index');

    }

    public function ssd()
    {
        $busOperators = BusOperator::query();
        return Datatables::of($busOperators)
            ->addColumn('action', function ($each) {
                $edit_icon='<a class="text-warning icons mr-2" href="'.route('bus.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
                $delete_icon='<a class=" Delete icons text-danger " href="#" data-id="'.$each->id.' "  style="font-size:18px; "><i class="fas fa-trash-alt"></i></a>';
                return '<div style="text-align:center;" >' . $edit_icon . $delete_icon . '</div>';
            })

            ->editColumn('logo',function($each){
                return '<img style="width:100px;" src="'.$each->logo_path().'">';
            })


            ->editColumn('amount', function ($each) {
                return number_format($each->amount);
            })
            ->editColumn('updated_at', function ($each) {
                $updated_at = Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
                return $updated_at;
            })

            ->rawColumns(['logo', 'action'])

            ->make(true);

    }

    public function create()
    {
        return view('backend.bus.create');
    }

    public function store(StoreCar $request)
    {
        $busOperators = new BusOperator;
        $logo_name=null;
        if($request->hasfile('logo')){
            $logo_file=$request->file('logo');
            $logo_name = uniqid() . '.' . time() . '.' . $logo_file->getClientOriginalExtension();
                Storage::disk('public')->put('bus/logo/' . $logo_name, file_get_contents($logo_file));
        }

        $images_name = [];
        if ($request->hasfile('images')) {

            $images_file = $request->file('images');
            foreach ($images_file as $image_file) {
                $image_name = uniqid() . '.' . time() . '.' . $image_file->getClientOriginalExtension();
                Storage::disk('public')->put('bus/images/' . $image_name, file_get_contents($image_file));
                $images_name[] = $image_name;
            }

        }
        $busOperators->name = $request->name;
        $busOperators->amount = $request->amount;
        $busOperators->description = $request->description;
        $busOperators->logo = $logo_name;
        $busOperators->images = $images_name;
        $busOperators->save();
        return redirect(route('bus.index'))->with('create', 'Bus Operator Created is successfully.');
    }

    public function edit($id)
    {
        $busOperator = BusOperator::findOrFail($id);
        return view('backend.bus.edit', compact('busOperator'));
    }

    public function update($id, UpdateCar $request)
    {
        $busOperator = BusOperator::findOrFail($id);

        $logo_name=$busOperator->logo;
        if($request->hasfile('logo')){
            Storage::disk('public')->delete('bus/logo/' . $logo_name);

            $logo_file=$request->file('logo');

            $logo_name = uniqid() . '.' . time() . '.' . $logo_file->getClientOriginalExtension();
                Storage::disk('public')->put('bus/logo/' . $logo_name, file_get_contents($logo_file));
        }

        $images_name = $busOperator->images;
        if ($request->hasfile('images')) {

            $oldimages_name = $busOperators->images ?? [];
            foreach ($oldimages_name as $oldimage_name) {
                Storage::disk('public')->delete('bus/images/' . $old_image_name);

            }

            $images_file = $request->file('images');
            foreach ($images_file as $image_file) {
                $image_name = uniqid() . '.' . time() . '.' . $image_file->getClientOriginalExtension();
                Storage::disk('public')->put('bus/images/' . $image_name, file_get_contents($image_file));
                $images_name[] = $image_name;

            }

        }
        $busOperator->name = $request->name;
        $busOperator->amount = $request->amount;
        $busOperator->description = $request->description;
        $busOperator->logo = $logo_name;
        $busOperator->images = $images_name;
        $busOperator->update();
        return redirect(route('bus.index'))->with('update', 'Bus Operators Updated is successfully.');
    }

    public function destroy($id)
    {
        $busOperator = BusOperator::findOrFail($id);
        $busOperator->delete($id);

        return 'success';

    }
}
