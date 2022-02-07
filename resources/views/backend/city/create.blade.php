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
        <form action="{{route('city.store')}}" method="POST" enctype="multipart/form-data"  id="create-form" >
            @csrf

            <div class="form-group">
                <label>City Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Region</label>
                <input type="text" name="region" class="form-control">
            </div>
            <div class="input-group mb-2">
                <div class="custom-file">
                  <input type="file"  id="inputGroupFile" name="images[]" multiple>
                  <label class="custom-file-label" for="inputGroupFile">City Image</label>
                </div>
            </div>
            <div class="preview_img mb-2"></div>
            <div class="form-group">
                <textarea class="form-control" name="about" placeholder="About City"></textarea>
            </div>

            <button class="btn btn-theme">Confirm</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreCity','#create-form') !!}

<script>

$('#inputGroupFile').on('change',function(){
        var file_length=document.getElementById('inputGroupFile').files.length;
        $('.preview_img').html('');
        for(var i=0; i < file_length ;i++){
             $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}" />`);
        }
    })

</script>

@endsection
