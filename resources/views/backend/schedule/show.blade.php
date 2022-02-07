@extends('backend.layouts.app')
@section('title','Cities Detail Page')
@section('schedule','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-map icon-gradient bg-mean-fruit">
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
    <a class="back-btn btn btn-dark  text-white mb-2" >Back</a>

</div>
<div class="card">

    <div class="card-body">
        <h3>{{$schedule->title}}</h3>
        <p ><span>Bus Opeartor Name :</span> <span class="text-theme">{{$schedule->bus_operator ? $schedule->bus_operator->name : ''}}</span></p>
        <p ><span>Departure City Name :</span> <span class="text-theme">{{$schedule->from_city ? $schedule->from_city->name : ''}}</span></p>
        <p ><span>Arrival City Name :</span> <span class="text-theme">{{$schedule->to_city ? $schedule->to_city->name : ''}}</span></p>
        <p ><span>Bus Level :</span> <span class="text-theme">{{$schedule->level ? $schedule->level->name : ''}}</span></p>
        <p ><span>Departure Day :</span> <span class="text-theme">{{$schedule->day ? $schedule->day->day_name : ''}}</span></p>
        <p ><span>Local Price  :</span> <span class="text-theme">{{number_format($schedule->local_price)}} ( MMK )</span></p>
        <p ><span>Foreign Price:</span> <span class="text-theme">{{number_format($schedule->foreign_price)}}</span></p>
        <p ><span>Duration :</span> <span class="text-theme">{{$schedule->duration }}</span></p>


    </div>

</div>
@endsection
@section('scripts')
<script>

</script>

@endsection
