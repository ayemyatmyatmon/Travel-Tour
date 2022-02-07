@extends('backend.layouts.app')
@section('title','Edit City Page')
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
        <form action="{{route('schedule.update',$schedule->id)}}" method="POST" enctype="multipart/form-data" id="create-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label >Bus Operator</label>
                <select class="custom-select select-box" name="bus_operator_id"  >
                    <option selected>Bus Operator </option>
                    @foreach ($bus_operators as $bus_operator )
                    <option value="{{$bus_operator->id}}" @if ($bus_operator->id == $schedule->bus_operator_id) selected @endif>{{$bus_operator->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label >Departure City</label>
                <select class="custom-select select-box" name="from_city_id" >
                    <option selected>Departure City</option>
                    @foreach ($cities as $city )
                    <option value="{{$city->id}}" @if ($city->id == $schedule->from_city_id) selected @endif>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label >Arrival City</label>
                <select class="custom-select select-box" name="to_city_id" >
                    <option selected>Arrival City</option>
                    @foreach ($cities as $city )
                    <option value="{{$city->id}}" @if ($city->id == $schedule->to_city_id) selected @endif>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label >Bus Level</label>
                <select class="custom-select select-box" name="level_id" >
                    <option selected>Bus Level</option>
                    @foreach ($levels as $level )
                    <option value="{{$level->id}}" @if ($level->id == $schedule->level_id) selected @endif>{{$level->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label >Bus Type</label>
                <select class="custom-select select-box" name="bus_type_id">
                    <option selected>Bus Type</option>
                    @foreach ($bus_types as $bus_type )
                    <option value="{{$bus_type->id}}" @if ($bus_type->id == $schedule->bus_type_id) selected @endif>{{$bus_type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label >Days</label>
                <select class="custom-select select-box" name="day_id" id="select5-box">
                    <option selected>day</option>
                    @foreach ($days as $day )
                    <option value="{{$day->id}}" @if ($day->id == $schedule->day_id) selected @endif>{{$day->day_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Local Price</label>
                <input type="number" name="local_price" class="form-control" value="{{$schedule->local_price}}">
            </div>

            <div class="form-group">
                <label>Foreign Price</label>
                <input type="number" name="foreign_price" class="form-control" value="{{$schedule->foreign_price}}">
            </div>

            <div class="form-group">
                <label>Departure Time</label>
                <input type="text" name="departure_time" class="form-control datepicker" value="{{$schedule->departure_time}}">
            </div>

            <div class="form-group">
                <label>Arrival Time</label>
                <input type="text" name="arrival_time" class="form-control datepicker" value="{{$schedule->arrival_time}}">
            </div>

            <div class="form-group">
                <label>Duration Time</label>
                <input type="text" name="duration" class="form-control" value="{{$schedule->duration}}">
            </div>

            <button class="btn btn-theme">Update</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateSchedule','#create-form') !!}

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
