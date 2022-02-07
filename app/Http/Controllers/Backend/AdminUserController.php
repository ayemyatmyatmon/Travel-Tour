<?php

namespace App\Http\Controllers\Backend;

use App\Adminuser;
// use Datatables;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminUser;
use App\Http\Requests\UpdateAdminUser;

class AdminUserController extends Controller
{
    public function home(){

        return view('backend.home');
        $adminusers=Adminuser::query();
        return $adminusers;

    }
    public function index(){
        return view('backend.adminuser.index');

    }

    public function ssd(){
        $adminusers=Adminuser::query();
        return Datatables::of($adminusers)
        ->addColumn('action',function($each){
            $edit_icon='<a class="text-warning mr-2" href="'.route('adminuser.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
            $delete_icon='<a class=" Delete text-danger " href="#" data-id="'.$each->id.' "  style="font-size:18px; "><i class="fas fa-trash-alt"></i></a>';
            return '<div >'.$edit_icon.$delete_icon.'</div>';
        })
        ->make(true);

    }
    public function create(){
        return view('backend.adminuser.create');
    }
    public function store(StoreAdminUser $request){
        $adminusers=new Adminuser;
        $adminusers->name=$request->name;
        $adminusers->email=$request->email;
        $adminusers->phone=$request->phone;
        $adminusers->password=Hash::make($request->password);
        $adminusers->save();
        return redirect(route('adminuser.index'))->with('create','AdminUser Created is successfully.');
    }

    public function edit($id){
        $adminuser=Adminuser::findOrFail($id);
        return view('backend.adminuser.edit',compact('adminuser'));
    }
    public function update($id,UpdateAdminUser $request){
        $adminuser=Adminuser::findOrFail($id);
        $adminuser->name=$request->name;
        $adminuser->email=$request->email;
        $adminuser->phone=$request->phone;
        $adminuser->password=$request->password ? (Hash::make($request->password)) : $adminuser->password;
        $adminuser->update();
        return redirect(route('adminuser.index'))->with('update','AdminUser Updated is successfully.');
    }
    public function destroy($id){
        $adminuser=Adminuser::findOrFail($id);
        $adminuser->delete($id);
        return 'success';

    }
   
}
