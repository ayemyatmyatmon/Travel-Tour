@extends('backend.layouts.app')
@section('title','Create City Page')
@section('schedule','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>

            <div>@yield('title')
                <div class="page-title-subheading">This is an example dashboard created using
                    build-in elements and components.
                </div>
            </div>
        </div>

    </div>
</div>
<div>
    <a class="back-btn btn btn-dark  text-white my-2">Back</a>

</div>
<div class="card">
    <div class="card-body">
        <form action="{{route('schedule.store')}}" method="POST" enctype="multipart/form-data" id="create-form">
            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Bus Operator</label>
                <select class="custom-select select-box" name="bus_operator_id" >
                    <option selected>Bus Operator </option>
                    @foreach ($bus_operators as $bus_operator )
                    <option value="{{$bus_operator->id}}">{{$bus_operator->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Departure City</label>
                <select class="custom-select select-box" name="from_city_id" >
                    <option selected>Departure City</option>
                    @foreach ($cities as $city )
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Arrival City</label>
                <select class="custom-select select-box" name="to_city_id" >
                    <option selected>Arrival City</option>
                    @foreach ($cities as $city )
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Bus Level</label>
                <select class="custom-select select-box" name="level_id" >
                    <option selected>Bus Level</option>
                    @foreach ($levels as $level )
                    <option value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Bus Type</label>
                <select class="custom-select select-box" name="bus_type_id">
                    <option selected>Bus Type</option>
                    @foreach ($bus_types as $bus_type )
                    <option value="{{$bus_type->id}}">{{$bus_type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Days</label>
                <select class="custom-select select-box" name="day_id" id="select5-box">
                    <option selected>day</option>
                    @foreach ($days as $day )
                    <option value="{{$day->id}}">{{$day->day_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Local Price</label>
                <input type="number" name="local_price" class="form-control">
            </div>

            <div class="form-group">
                <label>Foreign Price</label>
                <input type="number" name="foreign_price" class="form-control">
            </div>

            <div class="form-group">
                <label>Departure Time</label>
                <input type="text" name="departure_time" class="form-control datepicker" >
            </div>

            <div class="form-group">
                <label>Arrival Time</label>
                <input type="text" name="arrival_time" class="form-control datepicker" >
            </div>

            <div class="form-group">
                <label>Duration Time</label>
                <input type="text" name="duration" class="form-control" >
            </div>

            <button class="btn btn-theme">Confirm</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreSchedule','#create-form') !!}

<script>
    $(document).ready(function() {
        $('.select-box').select2();
        theme:"bootstrap";


    });
    $('.datepicker').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "timePicker": true,
                "timePicker24Hour": true,
                "timePickerSeconds": true,

                locale: {
                format: 'HH:mm:ss',
                }

                }).on('show.daterangepicker', function(ev, picker) {
                    picker.container.find('.calendar-table').hide();

                });
</script>

@endsection
