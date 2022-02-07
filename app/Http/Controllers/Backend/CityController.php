<?php

namespace App\Http\Controllers\Backend;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCity;
use App\Http\Requests\UpdateCity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class CityController extends Controller
{

    public function index()
    {
        return view('backend.city.index');

    }

    public function ssd()
    {
        $cities = City::query();
        return Datatables::of($cities)
            ->addColumn('action', function ($each) {
                $edit_icon = '<a class="text-warning mr-1 icons" href="' . route('city.edit', $each->id) . '" ><i class="fas fa-edit "></i></a>';
                $detail_icon = '<a class="text-primary mr-1 icons" href="' . route('city.show', $each->id) . '"><i class="fas fa-info-circle "></i></a>';
                $delete_icon = '<a class=" Delete text-danger icons " href="#" data-id="' . $each->id . ' "><i class="fas fa-trash-alt"></i></a>';
                return '<div style="width:120px;">' . $edit_icon . $detail_icon . $delete_icon . '</div>';
            })
        // ->editColumn('images',function($each){
        //     $output='';
        //     foreach($each->images as $image){
        //         $output.='<img style="width:100px;" src="'.$image->image_path().'"><p class="my-1"> </p>';

        //     }

        //     return $output;

        // })
            ->editColumn('updated_at', function ($each) {
                $updated_at = Carbon::parse($each->updated_at)->format('Y-m-d ');
                return $updated_at;
            })
            ->editColumn('about', function ($each) {
                $about = Str::limit($each->about, '80');
                return $about;
            })
            ->rawColumns(['action', 'about'])
            ->make(true);

    }
    public function create()
    {

        return view('backend.city.create');
    }
    public function store(StoreCity $request)
    {
        $cities = new City();
        $images_name = [];
        if ($request->hasfile('images')) {
            $images_file = $request->file('images');
            foreach ($images_file as $image_file) {
                $image_name = uniqid() . '.' . time() . '.' . $image_file->getClientOriginalExtension();
                Storage::disk('public')->put('city/' . $image_name, file_get_contents($image_file));
                $images_name[] = $image_name;

            }
        }

        $cities->name = $request->name;
        $cities->region = $request->region;
        $cities->about = $request->about;
        $cities->images = $images_name;
        $cities->save();

        return redirect(route('city.index'))->with('create', 'Cities Created is successfully.');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('backend.city.edit', compact('city'));
    }

    public function update($id, UpdateCity $request)
    {
        $cities = City::findOrFail($id);
        $images_name = $cities->images;

        $images_name = [];
        if ($request->hasfile('images')) {

            $old_images_name = $cities->images ?? [];
            foreach($old_images_name as $old_image_name){
                Storage::disk('public')->delete('city/' . $old_image_name);
            }


            $images_file = $request->file('images');
            foreach ($images_file as $image_file) {

                $image_name = uniqid() . '.' . time() . '.' . $image_file->getClientOriginalExtension();
                Storage::disk('public')->put('city/' . $image_name, file_get_contents($image_file));
                $images_name[] = $image_name;

            }
        }

        $cities->name = $request->name;
        $cities->region = $request->region;
        $cities->about = $request->about;
        $cities->images = $images_name;
        $cities->update();
        return redirect(route('city.index'))->with('update', 'Cities Updated is successfully.');
    }
    public function show($id)
    {
        $city = City::findOrFail($id);
        return view('backend.city.show', compact('city'));
    }
    public function destroy($id)
    {
        $cities = City::findOrFail($id);
        $cities->delete($id);
        return 'success';

    }
}
