@extends('frontend.travel.master')
@section('content')
<div class="card">
    <div class="card-body p-0 ">
        <div class="bus-page-banner-caption" style="padding-top:150px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <p class="text-theme text-center">Search Trip</p>
                                <form action="{{route('bus.search')}}" method="GET" id="create-form">
                                    <div class="row ticket">
                                        <div class="form-group mb-3 col-md-3" style="padding-right:1px !important;">
                                            <select class=" from_city custom-select select-box " name="from_city_id">
                                                <option selected>From City</option>
                                                @foreach ($cities as $city )
                                                <option value="{{$city->id}}" @if($city->id == request()->from_city_id)
                                                    selected @endif >{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3 col-md-3" style="padding:1px !important;">
                                            <select class="to_city custom-select select-box " name="to_city_id">
                                                <option selected>To City</option>
                                                @foreach ($cities as $city )
                                                <option value="{{$city->id}}" @if($city->id == request()->to_city_id)
                                                    selected @endif>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group col-md-2" style="padding:1px !important;">
                                            <input type="text" class="form-control depanture" placeholder="Departure"
                                                name="day" value="{{request()->day}}">
                                        </div>
                                        <div class='seat form-group col-md-2 d-flex justify-content-between align-items-center'
                                            style="border:1px solid #8bc34a;background:#fff;border-radius:5px;padding:0px !important;">
                                            <form>

                                                <div class="value-button" id="decrease" onclick="decreaseValue()"
                                                    value="Decrease Value">-</div>
                                                <input type="number" id="number" value="{{request()->seat}}"
                                                    name="seat" />@if(request()->seat == 1) seat @else seats @endif
                                                <div class="value-button" id="increase" onclick="increaseValue()"
                                                    value="Increase Value">+</div>
                                            </form>


                                        </div>
                                        <div class="search col-md-2" style="padding:1px !important;">
                                            <button class="btn btn-theme btn-block search_btn">Search</button>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end banner -->
        <div class="m-5">
            <div class="container">
                @foreach ($schedules as $schedule )

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>{{'Carbon\Carbon'::parse($schedule->departure_time)->format('h:m A
                                    ')}}-{{$schedule->level ? $schedule->level->name : ''}}</h5>
                                <div>
                                    <span>Departs : </span>
                                    <span>{{'Carbon\Carbon'::parse(request()->day . ' ' . $schedule->departure_time)->format('d
                                        M Y h:i A')}}</span>
                                </div>
                                <div>
                                    <span>Arrive : </span>
                                    <span>{{'Carbon\Carbon'::parse(request()->day . ' ' . $schedule->arrival_time)->format('d M
                                        Y h:i A')}}</span>
                                </div>
                                <div>
                                    <span>Durations : </span>
                                    <span>{{$schedule->duration}}</span>
                                </div>
                            </div>

                            <div class="col-md-3 " style="text-align: center;">
                                <img src="{{asset('storage/bus/logo/'. $schedule->bus_operator->logo)}}"
                                    style="width:150px;">
                                <div>{{$schedule->bus_operator? $schedule->bus_operator->name : ''}}</div>


                            </div>

                            <div class="col-md-3" style="text-align: center;">
                                <h3 class="text-theme">
                                    {{number_format(($schedule->local_price)*(request()->seat))}} MMK
                                </h3>
                                <p>{{(request()->seat)}} @if(request()->seat == 1) seat @else seats @endif <i class="fas fa-times" style="font-size:10px;"></i> {{number_format($schedule->local_price)}} MMK </i>
                                <a href="{{url('busticket/seatplan/' . $schedule->id . '?day=' . request()->day . '&seat=' . request()->seat)}}"
                                    class="btn btn-theme">Seat Selected</a>

                            </div>
                        </div>

                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="card">

</div>

@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreTicket','#create-form') !!}

<script>
    $(document).ready(function() {
        $('.select-box').select2();
        theme:"bootstrap";

        $('.depanture').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "showDropdowns": true,
                "minDate":moment(),
                locale: {
                format: 'YYYY-MM-DD'
                }

            });


        });

        function increaseValue() {
                var value = parseInt(document.getElementById('number').value, 4);
                value = isNaN(value) ? 0 : value;
                value++;
                document.getElementById('number').value = value;
                }

        function decreaseValue() {
                var value = parseInt(document.getElementById('number').value,10);
                value = isNaN(value) ? 0 : value;
                value < 2 ? value = 2 : '';
                value--;
                document.getElementById('number').value = value;
            }






</script>

@endsection
