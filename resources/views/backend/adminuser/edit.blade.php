@extends('backend.layouts.app')
@section('title','Admin-User Edit Page')
@section('adminuser','mm-active')
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
        <form action="{{route('adminuser.update',$adminuser->id)}}" method="POST" id="update-form" >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Enter Your Name</label>
                <input type="text" name="name" class="form-control" value="{{$adminuser->name}}">
            </div>
            <div class="form-group">
                <label>Enter Your Email</label>
                <input type="email" name="email" class="form-control" value="{{$adminuser->email}}">
            </div>
            <div class="form-group">
                <label>Enter Your Phone</label>
                <input type="number" name="phone" class="form-control" value="{{$adminuser->phone}}">
            </div>
            <div class="form-group">
                <label>Enter Your Password</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <button class="btn btn-theme">Update</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateAdminUser','#update-form') !!}

<script>


</script>

@endsection
