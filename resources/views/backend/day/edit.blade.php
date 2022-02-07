@extends('backend.layouts.app')
@section('title','Create Hotel Page')
@section('day','mm-active')
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
    <a class="back-btn btn btn-dark  text-white my-2" >Back</a>

</div>

<div class="card">
    <div class="card-body">
        <form action="{{route('day.update',$day->id)}}" method="POST" id="create-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Hotel Name</label>
                <input type="text" name="day_name" class="form-control" value="{{$day->day_name}}">
            </div>

            <button class="btn btn-theme mt-2" >Update</button>
        </form>

    </div>
</div>

@endsection

@section('scripts')

<script></script>

@endsection
