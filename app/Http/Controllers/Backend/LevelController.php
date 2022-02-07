<?php

namespace App\Http\Controllers\Backend;

use App\Level;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Http\Controllers\Controller;


class LevelController extends Controller
{

    public function index(){
        return view('backend.level.index');

    }

    public function ssd(){
        $levels=Level::query();
        return Datatables::of($levels)
        ->addColumn('action',function($each){
            $edit_icon='<a class="text-warning icons mr-2" href="'.route('level.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
            $delete_icon='<a class=" Delete icons text-danger " href="#" data-id="'.$each->id.' "  style="font-size:18px; "><i class="fas fa-trash-alt"></i></a>';
            return '<div style="text-align:center;"">'.$edit_icon.$delete_icon.'</div>';
        })
        ->editColumn('updated_at',function($each){
            $updated_at=Carbon::parse($each->updated_at)->format('Y-m-d ');
            return $updated_at;
        })
        ->make(true);

    }

    public function create(){
        $levels=Level::get();
        return view('backend.level.create',compact('levels'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $levels=new Level;
        $levels->name=$request->name;
        $levels->save();
        return redirect(route('level.index'))->with('create','levels Created is successfully.');
    }

    public function edit($id){
        $level=Level::findOrFail($id);
        return view('backend.level.edit',compact('level'));
    }

    public function update($id,Request $request){
        $level=Level::findOrFail($id);
        $level->name=$request->name;
        $level->update();
        return redirect(route('level.index'))->with('update','levels Updated is successfully.');
    }

    public function destroy($id){
        $level=Level::findOrFail($id);
        $level->delete($id);
        return 'success';

    }
}
