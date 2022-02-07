@extends('frontend.travel.master')
@section('extra.css')
<style>
    .seat_choose {
        background: #8bc34a !important;
    }

    .seat_avaliable {
        background: #ddd !important;
    }
</style>
@endsection
@section('content')
<div class="seatselect bus-page-banner-caption" style="padding-top:150px;padding-bottom:100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Please select {{request()->seat}} Seats.
                        </h5>
                    </div>

                    <div class="d-flex justify-content-center mt-3 text-left">
                        <div class="btn btn-block"
                            style="background:#e5e7e9;width:490px;border:1px solid #888;padding:12px;">Driver</div>
                    </div>

                    <div class="card-body d-flex justify-content-center">
                        <table>
                            <tbody>

                                @foreach ($seat_setting as $row)
                                <tr>
                                    @foreach ($row as $each_seat)
                                    @if($each_seat)
                                    <td>
                                        @if(in_array($each_seat, $booking_seat_numbers))
                                        <a href="#" class="bg-dark ">
                                            <span>{{$each_seat}}</span>

                                        </a>
                                        @else
                                        <a href="#" class="seat-btn @if(in_array($each_seat, $booking_seat_numbers)) bg-dark   @endif " data-seat-number="{{$each_seat}}">
                                            <span>{{$each_seat}}</span>
                                        </a>
                                        @endif

                                    </td>
                                    @else
                                    <td>
                                        <a href="#" style="border:none !important;background:none !important;">
                                            <span></span>
                                        </a>
                                    </td>
                                    @endif
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Booking Summary</h5>
                    </div>

                    <div class="card-body ">

                        <p class="d-flex justify-content-between">
                            <span>Bus Operator</span>
                            <span>{{$schedule->bus_operator ? $schedule->bus_operator->name : ''}}</span>
                        </p>

                        <p class="d-flex justify-content-between">

                            <span>Route</span>
                            <span>{{$schedule->from_city ? $schedule->from_city->name : ''}}-{{$schedule->to_city ?
                                $schedule->to_city->name : ''}}</span>
                        </p>

                        <p class="d-flex justify-content-between">
                            <span>Departure Time</span>
                            <span>{{'Carbon\Carbon'::parse(request()->day . ' ' . $schedule->departure_time)->format('d
                                M Y h:i A')}}</span>
                        </p>

                        <p class="d-flex justify-content-between">
                            <span>Arrival Time</span>
                            <span>{{'Carbon\Carbon'::parse(request()->day . ' ' . $schedule->arrival_time)->format('d M
                                Y h:i A')}}</span>
                        </p>
                        <p class="text-theme d-flex justify-content-between">
                            <span>Subotal</span>
                            <span>{{number_format(($schedule->local_price)*(request()->seat))}} MMK</span>
                        </p>
                    </div>

                    <div class="card-footer text-center " style="background:none !important;">
                        <p>Please select {{request()->seat}} Seats.</p>
                        <h3 class="countseat "></h3>


                        <a href="#" class="btn btn-theme btn-block travellerinfo-btn ">Continue to traveler info</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreTicket','#create-form') !!}

<script>
    $("document").ready(function(){
        var schedule_id = "{{request()->schedule_id}}";
        var day = "{{request()->day}}";
        var seat_count = parseInt("{{request()->seat}}");
        $('.seat-btn').on('click',function(e){
            e.preventDefault();

            if($('.seat_choose').length < seat_count){
                $(this).toggleClass('seat_choose');

                var seat_numbers = [];
                $('.seat_choose').each(function(each){
                    seat_numbers.push($(this).data('seat-number'));
                });

                var seat_number_str1 = seat_numbers.join(' , ');
                var seat_number_str2 = seat_numbers.join(',');

                $(".countseat").html(seat_number_str1);
                $('.travellerinfo-btn').attr("href", `/busticket/booking?schedule_id=${schedule_id}&day=${day}&seat=${seat_count}&seat_number=${seat_number_str2}`)
            }

        });

    });
</script>

@endsection
