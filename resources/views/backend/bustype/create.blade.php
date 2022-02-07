@extends('backend.layouts.app')
@section('title','Create Hotel Page')
@section('bustype','mm-active')
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
        <form action="{{route('bustype.store')}}" method="POST" id="create-form" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Bus Type Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror

            <button class="btn btn-theme mt-2">Confirm</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')

<script>

</script>

@endsection
