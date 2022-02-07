@extends('backend.layouts.app')
@section('title','Edit Package Page')
@section('package','mm-active')
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
        <form action="{{route('package.update',$package->id)}}" method="POST" id="update-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>From_to_City</label>
                <input type="text" name="from_to_city" class="form-control" value="{{$package->from_to_city}}">
            </div>
            <div class="form-group">
                <label>Duration</label>
                <input type="string" name="duration" class="form-control" value="{{$package->duration}}">
            </div>

            <div class="form-group">
                <label>Amount(MMK)</label>
                <input type="number" name="amount" class="form-control" value="{{$package->amount}}">
            </div>

            <div class="form-group">
                <label>Person Quantity</label>
                <input type="string" name="person_quantity" class="form-control" value="{{$package->person_quantity}}">
            </div>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="image" id="inputGroupFile" name="images">
                    <label class="custom-file-label" for="inputGroupFile">City Image</label>
                </div>
            </div>
            <div class="preview_img">
                @if($package->images)
                <img src="{{asset('storage/package/'.$package->images)}}">
                @endif
            </div>

            <button class="btn btn-theme mt-2" >Update</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdatePackage','#update-form') !!}

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
