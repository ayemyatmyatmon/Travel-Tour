@extends('backend.layouts.app')
@section('title','Create City Page')
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
        <form action="{{route('city.update',$city->id)}}" method="POST" id="update-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>City Name</label>
                <input type="text" name="name" class="form-control" value="{{$city->name}}">
            </div>
            <div class="form-group">
                <label>Region</label>
                <input type="text" name="region" class="form-control " value="{{$city->region}}">
            </div>
            <div class="input-group mb-2">
                <div class="custom-file">
                  <input type="file" class="image" id="inputGroupFile" name="images[]" multiple>
                  <label class="custom-file-label" for="inputGroupFile">City Image</label>
                </div>


            </div>
                <div class="preview_img mb-2">
                    @if($city->image)
                    <img src="{{$city->image_path()}}">
                    @endif
                </div>
            <div class="form-group">
                <textarea class="form-control" name="about" placeholder="About City">{{$city->about}}</textarea>
            </div>

            <button class="btn btn-theme">Update</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateCity','#update-form') !!}

<script>


</script>

@endsection
