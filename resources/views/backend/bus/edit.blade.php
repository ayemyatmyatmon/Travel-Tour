@extends('backend.layouts.app')
@section('title','Edit City Page')
@section('bus','mm-active')
@section('extra.css')
<style>
    .preview_logo img{
        width:100px !important;
    }
</style>
@endsection
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
        <form action="{{route('bus.update',$busOperator->id)}}" method="POST" id="update-form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Car Name</label>
                <input type="text" name="name" class="form-control" value="{{$busOperator->name}}">
            </div>

            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="amount" class="form-control" value="{{$busOperator->amount}}">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{$busOperator->description}}</textarea>
            </div>

            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="logo" id="inputGroupLogo" name="logo">
                    <label class="custom-file-label" for="inputGroupLogo">Logo</label>
                </div>
            </div>

            <div class="preview_logo">
                @if($busOperator->logo)
                <img src="{{$busOperator->logo_path()}}">
                @endif
            </div>

            <div class="input-group mt-3">
                <div class="custom-file">
                    <input type="file" class="image" id="inputGroupFile" name="images[]" multiple>
                    <label class="custom-file-label" for="inputGroupFile">Car Image</label>
                </div>
            </div>

            <div class="preview_img">
                @if($busOperator->images)
                @foreach ($busOperator->images as $image )
                <img src="{{asset('storage/bus/images/'.$image)}}">

                @endforeach
                @endif
            </div>

            <button class="btn btn-theme mt-2">Update</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateCar','#update-form') !!}

<script>
    $('#inputGroupFile').on('change',function(){
        var file_length=document.getElementById('inputGroupFile').files.length;
        $('.preview_img').html('');
        for(var i=0; i < file_length ;i++){
            $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}" />`);
        }
    })

    $('#inputGroupLogo').on('change',function(){
        var file_length=document.getElementById('inputGroupLogo').files.length;
        $('.preview_logo').html('');
        for(var i=0; i < file_length ;i++){
            $('.preview_logo').append(`<img src="${URL.createObjectURL(event.target.files[i])}" />`);
        }
    })

</script>

@endsection
