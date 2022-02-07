<?php

namespace App\Http\Controllers\Backend;

use App\Day;
use App\City;
use App\Level;
use App\BusType;
use Carbon\Carbon;
use App\BusOperator;
use App\Bus_Schedule;
use Yajra\Datatables\Datatables;
use App\Http\Requests\UpdateCity;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchedule;
use App\Http\Requests\UpdateSchedule;

class BusScheduleController extends Controller
{

    public function index()
    {
        return view('backend.schedule.index');

    }

    public function ssd()
    {
        $schedules = Bus_Schedule::with('bus_operator','from_city','to_city','level','bus_type','day');
        return Datatables::of($schedules)
            ->addColumn('action', function ($each) {
                $edit_icon = '<a class="text-warning mr-1 icons" href="' . route('schedule.edit', $each->id) . '" ><i class="fas fa-edit "></i></a>';
                $detail_icon = '<a class="text-primary mr-1 icons" href="' . route('schedule.show', $each->id) . '"><i class="fas fa-info-circle "></i></a>';
                $delete_icon = '<a class=" Delete text-danger icons " href="#" data-id="' . $each->id . ' "><i class="fas fa-trash-alt"></i></a>';
                return '<div style="width:120px;">' . $edit_icon . $detail_icon . $delete_icon . '</div>';
            })
            ->addColumn('busoperator_name',function($each){
                return $each->bus_operator ? $each->bus_operator->name : '';
            })

            ->addColumn('departure_city',function($each){
                return $each->from_city ? $each->from_city->name : '';
            })

            ->addColumn('arrival_city',function($each){
                return $each->to_city ? $each->to_city->name : '';
            })

            ->editColumn('day_name',function($each){
                return $each->day ? $each->day->day_name : '';
            })

            ->editColumn('departure_time',function($each){
                return $each->departure_time;
            })

            ->editColumn('arrival_time',function($each){
                return $each->arrival_time;

            })

            ->editColumn('updated_at', function ($each) {
                $updated_at = Carbon::parse($each->updated_at)->format('Y-m-d ');
                return $updated_at;
            })

            ->rawColumns(['action', 'about'])
            ->make(true);

    }
    public function create()
    {
        $cities=City::orderBy('name')->get();
        $bus_operators=BusOperator::orderBy('name')->get();
        $bus_types=BusType::orderBy('name')->get();
        $days=Day::get();
        $levels=Level::get();

        return view('backend.schedule.create',compact('cities','bus_operators','bus_types','days','levels'));
    }
    public function store(StoreSchedule $request)
    {
        $schedules = new Bus_Schedule();
        $schedules->title = $request->title;
        $schedules->bus_operator_id = $request->bus_operator_id;
        $schedules->from_city_id = $request->from_city_id;
        $schedules->to_city_id = $request->to_city_id;
        $schedules->level_id = $request->level_id;
        $schedules->bus_type_id = $request->bus_type_id;
        $schedules->day_id = $request->day_id;
        $schedules->local_price = $request->local_price;
        $schedules->foreign_price = $request->foreign_price;
        $schedules->departure_time = $request->departure_time;
        $schedules->arrival_time = $request->arrival_time;
        $schedules->duration = $request->duration;
        $schedules->save();

        return redirect(route('schedule.index'))->with('create', 'Bus Schedule Created is successfully.');
    }

    public function edit($id)
    {
        $schedule = Bus_Schedule::findOrFail($id);
        $cities=City::get();
        $bus_operators=BusOperator::get();
        $bus_types=BusType::get();
        $days=Day::get();
        $levels=Level::get();
        return view('backend.schedule.edit', compact('schedule','cities','bus_operators','bus_types','days','levels'));
    }

    public function update($id, UpdateSchedule $request)
    {
        $schedules = Bus_Schedule::findOrFail($id);

        $schedules->title = $request->title;
        $schedules->bus_operator_id = $request->bus_operator_id;
        $schedules->from_city_id = $request->from_city_id;
        $schedules->to_city_id = $request->to_city_id;
        $schedules->level_id = $request->level_id;
        $schedules->bus_type_id = $request->bus_type_id;
        $schedules->day_id = $request->day_id;
        $schedules->local_price = $request->local_price;
        $schedules->foreign_price = $request->foreign_price;
        $schedules->departure_time = $request->departure_time;
        $schedules->arrival_time = $request->arrival_time;
        $schedules->duration = $request->duration;
        $schedules->update();
        return redirect(route('schedule.index'))->with('update', 'Bus Schedule Updated is successfully.');
    }
    public function show($id)
    {
        $schedule = Bus_Schedule::findOrFail($id);
        return view('backend.schedule.show', compact('schedule'));
    }
    public function destroy($id)
    {
        $schedule = Bus_Schedule::findOrFail($id);
        $schedule->delete($id);
        return 'success';

    }
}
