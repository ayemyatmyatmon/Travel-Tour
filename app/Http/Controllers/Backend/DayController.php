<?php

namespace App\Http\Controllers\Backend;

use App\Day;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;


class DayController extends Controller
{

    public function index(){
        return view('backend.day.index');

    }

    public function ssd(){
        $days=Day::query();
        return Datatables::of($days)
        ->addColumn('action',function($each){
            $edit_icon='<a class="text-warning icons mr-2" href="'.route('day.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
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
        $days=Day::get();
        return view('backend.day.create',compact('days'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $days=new Day;
        $days->day_name=$request->day_name;
        $days->save();
        return redirect(route('day.index'))->with('create','Day Created is successfully.');
    }

    public function edit($id){
        $day=Day::findOrFail($id);
        return view('backend.day.edit',compact('day'));
    }

    public function update($id,Request $request){
        

        $day=Day::findOrFail($id);
        $day->day_name=$request->day_name;
        $day->update();
        return redirect(route('day.index'))->with('update','Day Updated is successfully.');
    }

    public function destroy($id){
        $day=Day::findOrFail($id);
        $day->delete($id);
        return 'success';

    }
}
