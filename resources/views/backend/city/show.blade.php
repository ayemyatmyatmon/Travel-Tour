@extends('backend.layouts.app')
@section('title','Cities Detail Page')
@section('city','mm-active')
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
        <h3 >{{$city->name}}</h3>
        <div class="my-4">
            <img src="{{$city->image_path()}}">
        </div>
        <p>{{$city->about}}</p>
    </div>

</div>
@endsection
@section('scripts')
<script>

</script>

@endsection
