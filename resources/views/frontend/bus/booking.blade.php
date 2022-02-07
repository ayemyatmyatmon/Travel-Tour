@extends('frontend.travel.master')
@section('extra.css')
<style>
    .seat_available {
        background: #8bc34a !important;
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
                    <div class="card-body ">
                        <form action="{{route('bookingstore')}}" method="POST" id="create-form" >
                            @csrf
                            <input type="hidden" name="schedule_id" value="{{request()->schedule_id}}">
                            <input type="hidden" name="day" value="{{request()->day}}">
                            <input type="hidden" name="seat_count" value="{{request()->seat}}">
                            <input type="hidden" name="seat_number" value="{{$seat_number_str}}">
                            <input type="hidden" name="price" value={{request()->seat*($schedule->local_price)}}>
                            <div class="form-group">
                                <label>Traveller Name <sup><i class="text-danger fas fa-star" style="font-size:5px;"> </i></sup></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone Number <sup><i class="text-danger fas fa-star" style="font-size:5px;"> </i></sup></label>
                                <input type="text" name="phone" class="form-control" placeholder="09-------">
                                <span class="text-muted" style="font-size:13px;">Enter a Myanmar cell phone number. Example: 0912345667
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" >

                            </div>
                            <div class="form-group">
                                <label>Special Request</label>
                                <input type="text" name="specialrequest" class="form-control" >

                            </div>
                            <button class="btn btn-theme btn-block">Contiue To Payment</button>
                        </form>

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
                        <hr>

                        <p class="d-flex justify-content-between">
                            <span>Number of Seats </span>
                            <span>{{request()->seat}}@if (request()->seat == 1) seat @else seats @endif</span>
                        </p>

                        <p class="d-flex justify-content-between">
                            <span>Seat No.</span>
                            <span>{{request()->seat_number}}</span>
                        </p>
                        <hr>

                        <p class="text-theme d-flex justify-content-between">
                            <span>Subotal</span>
                            <span>{{number_format(($schedule->local_price)*(request()->seat))}} MMK</span>
                        </p>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreBooking','#create-form') !!}

<script>
    $("document").ready(function(){
        var seat_count = {{request()->seat}};
        $('.seat-btn').on('click',function(e){
            e.preventDefault();
            if($('.seat_available').length < seat_count){
                $(this).toggleClass('seat_available');

                var seat_numbers = [];
                $('.seat_available').each(function(each){
                    seat_numbers.push($(this).data('seat-number'));
                });

                $(".countseat").html(seat_numbers.join(', ')) ;
            }
        });

    });
</script>

@endsection
