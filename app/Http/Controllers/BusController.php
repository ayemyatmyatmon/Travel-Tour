<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Booking_Detail;
use App\BusOperator;
use App\Bus_Schedule;
use App\City;
use App\Day;
use App\Http\Requests\StoreBooking;
use App\Http\Requests\StoreTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('name')->get();
        $busoperators = BusOperator::get();
        return view('frontend.bus.index', compact('cities', 'busoperators'));
    }

    public function search(StoreTicket $request)
    {
        $from_city = $request->from_city_id;
        $to_city = $request->to_city_id;
        $depanture = $request->day;
        $day = Carbon::parse($depanture)->dayName;
        $day_id = Day::where('day_name', $day)->first();
        $schedules = Bus_Schedule::where('from_city_id', $from_city)->where('to_city_id', $to_city)->where('day_id', $day_id->id)->get();
        $cities = City::orderBy('name')->get();
        return view('frontend.bus.search', compact('schedules', 'cities'));
    }

    public function seatPlan($schedule_id, Request $request)
    {
        $schedule = Bus_Schedule::findOrFail($schedule_id);
        $seat_setting = [
            [1, 2, null, 3, 4],
            [5, 6, null, 7, 8],
            [9, 10, null, 11, 12],
            [13, 14, null, 15, 16],
            [17, 18, null, null, null],
            [19, 20, null, 21, 22],
            [23, 24, null, 25, 26],
            [27, 28, null, 29, 30],
            [31, 32, null, 33, 34],
            [35, 36, 37, 38, 39],
        ];

        // Booking
        $bookings = Booking::where('schedule_id', $schedule_id)->where('day', $request->day)->get();
        $booking_seat_numbers = [];
        foreach ($bookings as $each_booking) {
            $each_booking_seat_numbers = explode(',', $each_booking->seat_number);
            $booking_seat_numbers = collect($booking_seat_numbers)->concat($each_booking_seat_numbers)->toArray();
        }

        return view('frontend.bus.seatplan', compact('schedule', 'seat_setting', 'booking_seat_numbers'));
    }

    public function booking(Request $request)
    {
        $schedule_id = $request->schedule_id;
        $day = $request->day;
        $seat = $request->seat;
        $seat_number_str = $request->seat_number;
        $seat_number_ary = explode(',', $seat_number_str);

        if ($seat != count($seat_number_ary)) {
            return back()->withErrors(['fail' => 'Please choose the seat number.']);
        }

        $schedule = Bus_Schedule::findOrFail($schedule_id);

        return view('frontend.bus.booking', compact('schedule', 'day', 'seat', 'seat_number_str', 'seat_number_ary'));

    }
    public function bookingStore(StoreBooking $request)
    {
        $bookingdatas = new Booking();
        $bookingdatas->name = $request->name;
        $bookingdatas->phone = $request->phone;
        $bookingdatas->email = $request->email;
        $bookingdatas->schedule_id = $request->schedule_id;
        $bookingdatas->day = $request->day;
        $bookingdatas->seat_count = $request->seat_count;
        $bookingdatas->seat_number = $request->seat_number;
        $bookingdatas->price = $request->price;
        $bookingdatas->special_request = $request->special_request;
        $bookingdatas->save();

        $bookingdetail = Booking_Detail::firstOrCreate(
            ['booking_id' => $bookingdatas->id],
            ['schedule_id' => $bookingdatas->schedule_id],

        );
        return redirect('/busticket/booking/detail/' . $bookingdetail->id)->with('create', 'Successfully Bus Ticket Booking.');

    }

    public function bookingDetail($id)
    {
        $bookingdetail = Booking_Detail::findOrfail($id);
        return view('frontend.bus.bookingdetail', compact('bookingdetail'));
    }

    public function printTicket(Request $request)
    {
        $cities = City::orderBy('name')->get();
        return view('frontend.bus.printyourticket', compact('cities'));
    }

    public function printTicketShow(Request $request)
    {
        $request->validate(
            [
                'from_city_id' => 'required',
                'to_city_id' => 'required',
                'date' => 'required',
                'phone' => 'required',
            ]
        );

        $bookings = Booking::where('day', $request->date)
            ->where('phone', $request->phone)
            ->whereHas('schedule', function($query) use ($request){
                $query->where('from_city_id', $request->from_city_id)->where('to_city_id', $request->to_city_id);
            })
            ->get();

        if(count($bookings) < 0){
            return back()->withErrors(['fail' => 'Ticket is not found.'])->withInput();
        }

        $cities = City::orderBy('name')->get();

        return view('frontend.bus.printyourticketshow', compact('cities', 'bookings'));
    }

}
