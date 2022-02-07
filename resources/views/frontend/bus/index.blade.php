@extends('frontend.travel.master')
@section('content')
<div class="card">
    <div class="card-body p-0 ">
        <section class="bus-banner-bg inner-page-banner">
            <div class="bus-page-banner-caption" style="padding-top:150px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 col-sm-12 text-center">
                            <h3 class="text-left">Book Online Bus Ticket Around Myanmar</h3>
                            <p class="text-left text-white" >The leading bus ticketing system in Myanmar. Find the best price for your bus tickets.

                                70+ Operators
                            </p>
                        </div>
                        <div class="col-md-5 col-lg-6 col-sm-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <p class="text-theme text-center">Search Trip</p>

                                    <form action="{{route('bus.search')}}" method="GET" id="create-form" >
                                        <div class="form-group mb-3">
                                            <select class=" from_city custom-select select-box " name="from_city_id" >
                                                <option value="" selected>From City</option>
                                                @foreach ($cities as $city )
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <select class="to_city custom-select select-box " name="to_city_id" >
                                                <option value="" selected>To City</option>
                                                @foreach ($cities as $city )
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>


                                        <div class="form-group">
                                            <input type="text" class="form-control depanture" placeholder="Departure" name="day">

                                        </div>

                                        <div class="search">
                                            <button class="btn btn-theme btn-block search_btn">Search</button>
                                        </div>
                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end banner -->
        <div>
            <section class="section-spacing operator ">
                <div class="container">
                    <h3 class="text-center text-theme mb-4">Operators</h3>
                    <div class="row">
                        @foreach ($busoperators as $busoperator )
                            <div class="col-md-2">
                                <img src="{{asset('storage/bus/logo/'.$busoperator->logo)}}">
                            </div>
                        @endforeach
                    </div>
                </div>

            </section>
        </div>


    </div>
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


    </script>
@endsection
