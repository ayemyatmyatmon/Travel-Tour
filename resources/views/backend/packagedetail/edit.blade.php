@extends('backend.layouts.app')
@section('title','Create Package Page')
@section('packagedetail','mm-active')
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
        <form action="{{route('packagedetail.update',$packagedetail->id)}}" method="POST" id="create-form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <select class="custom-select" name="package_id" id="select-box">
                    <option selected>Choose Town</option>
                    @foreach ($packages as $package )
                    <option value="{{$package->id}}" @if($package->id==$packagedetail->package_id) selected
                        @endif>{{$package->duration}}({{$package->from_to_city}})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="About Journey"
                    value="{{$packagedetail->title}}">

            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea type="string" name="description"
                    class="form-control">{{$packagedetail->description}}</textarea>
            </div>


            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="image" id="inputGroupFile" name="image">
                    <label class="custom-file-label" for="inputGroupFile">City Image</label>
                </div>
            </div>
            <div class="preview_img">
                @if($packagedetail->image)
                <img src="{{$packagedetail->image_path()}}">
                @endif
            </div>


            <button class="btn btn-theme mt-2">Update</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StorePackage','#create-form') !!}

<script>
    $(document).ready(function() {
        $('#select-box').select2();
        theme:"bootstrap";
    });

$('#inputGroupFile').on('change',function(){
        var file_length=document.getElementById('inputGroupFile').files.length;
        $('.preview_img').html('');
        for(var i=0; i < file_length ;i++){
            $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}" />`);
        }
    })



</script>

@endsection
