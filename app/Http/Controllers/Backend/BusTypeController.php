<?php

namespace App\Http\Controllers\Backend;

use App\Level;
use App\BusType;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;


class BusTypeController extends Controller
{

    public function index(){
        return view('backend.bustype.index');

    }

    public function ssd(){
        $bustypes=BusType::query();
        return Datatables::of($bustypes)
        ->addColumn('action',function($each){
            $edit_icon='<a class="text-warning icons mr-2" href="'.route('bustype.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
            $delete_icon='<a class=" Delete icons text-danger " href="#" data-id="'.$each->id.' "  style="font-size:18px; "><i class="fas fa-trash-alt"></i></a>';
            return '<div style="text-align:center;">'.$edit_icon.$delete_icon.'</div>';
        })
        ->editColumn('updated_at',function($each){
            $updated_at=Carbon::parse($each->updated_at)->format('Y-m-d ');
            return $updated_at;
        })
        ->make(true);

    }

    public function create(){
        $bustypes=BusType::get();
        return view('backend.bustype.create',compact('bustypes'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        
        $bustypes=new BusType;
        $bustypes->name=$request->name;
        $bustypes->save();
        return redirect(route('bustype.index'))->with('create','levels Created is successfully.');
    }

    public function edit($id){
        $bustype=BusType::findOrFail($id);
        return view('backend.bustype.edit',compact('bustype'));
    }

    public function update($id,Request $request){
        $bustype=BusType::findOrFail($id);
        $bustype->name=$request->name;
        $bustype->update();
        return redirect(route('bustype.index'))->with('update','levels Updated is successfully.');
    }

    public function destroy($id){
        $bustype=BusType::findOrFail($id);
        $bustype->delete($id);
        return 'success';

    }
}
