<?php

namespace App\Http\Controllers\Backend;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class BusController extends Controller
{
    public function index(){
        return view('backend.booking.index');
    }

    public function ssd(){
        $bookings=Booking::query();
        return Datatables::of($bookings)
        ->addColumn('action',function($each){
            // $edit_icon='<a class="text-warning mr-2" href="'.route('booking.edit',$each->id).'" style="font-size:18px;"><i class="fas fa-edit "></i></a>';
            $delete_icon='<a class=" Delete text-danger " href="#" data-id="'.$each->id.' "  style="font-size:18px; "><i class="fas fa-trash-alt"></i></a>';
            return '<div >'.$delete_icon.'</div>';
        })
        ->addColumn('bus_operator',function($each){
            $bus_operator=$each->schedule ? $each->schedule->bus_operator->name :'';
            return $bus_operator;
        })
        ->addColumn('from_city',function($each){
            $from_city=$each->schedule ? $each->schedule->from_city->name : '';
            return $from_city;
        })
        ->addColumn('to_city',function($each){
            $to_city=$each->schedule ? $each->schedule->to_city->name : '';
            return $to_city;
        })
        ->make(true);

    }

    public function destroy($id){
        $booking=Booking::findOrFail($id);
        $booking->delete($id);
        return 'success';
    }
}
