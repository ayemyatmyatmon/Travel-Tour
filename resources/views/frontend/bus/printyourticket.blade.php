@extends('frontend.travel.master')
@section('content')
<div class="card">
    <div class="card-body p-0 " style="margin-bottom:80px;">
        <div class="bus-page-banner-caption" style="padding-top:150px;">
            <div class="container">
                <div class="row " >
                    <div class="col-md-12 col-lg-12">
                        <h3 class="text-theme">Find back your booking</h3>
                        <p>Find back your lost booking here by providing some info about your booking. All fields in the
                            form below are required to look up your lost booking.</p>

                        <div class="card bg-light">
                            <div class="card-body">
                                <form action="{{route('print-ticket-show')}}" method="GET" id="create-form">
                                    <div class="row ticket" style=" margin-top:30px;">
                                        <div class="form-group col-md-3" style="padding-right:1px !important;">
                                            <select class=" from_city custom-select select-box " name="from_city_id"
                                                required>
                                                <option value="">From City</option>
                                                @foreach ($cities as $city )
                                                <option value="{{$city->id}}" @if($city->id == request()->from_city_id)
                                                    selected @endif>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group  col-md-3" style="padding:1px !important;">
                                            <select class="to_city custom-select select-box " name="to_city_id"
                                                required>
                                                <option value="">To City</option>
                                                @foreach ($cities as $city )
                                                <option value="{{$city->id}}" @if($city->id == request()->to_city_id)
                                                    selected @endif>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2" style="padding:1px !important;">
                                            <input type="text" class="form-control depanture" placeholder="Departure"
                                                name="date" value="{{request()->date}}" required>
                                        </div>

                                        <div class="form-group col-md-2" style="padding:1px !important;">
                                            <input type="text" class="form-control" name="phone"
                                                style="height:40px !important;" placeholder="phone"
                                                value="{{request()->phone}}" required>

                                        </div>
                                        <div class="search col-md-2" style="padding:1px !important;">
                                            <button type="submit" class="btn btn-theme btn-block search_btn">Retrieve Booking</button>
                                        </div>
                                    </div>
                                </form>

                                @if (count($errors))
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.select-box').select2();
        theme:"bootstrap";

        $('.depanture').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "showDropdowns": true,
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
