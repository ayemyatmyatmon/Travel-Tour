@extends('backend.layouts.app')
@section('title','Create Hotel Page')
@section('hotel','mm-active')
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
        <form action="{{route('hotel.store')}}" method="POST" id="create-form" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <select class="custom-select"  name="city_id" id="select-box">
                <label>Citys </label>
                  <option selected>Choose Town</option>
                    @foreach ($cities as $city )
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Hotel Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Days</label>
                <input type="text" name="day" class="form-control">
            </div>
            <div class="form-group">
                <label>Person(how many people)</label>
                <input type="number" name="person" class="form-control">
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="amount" class="form-control">
            </div>


            <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="image" id="inputGroupFile" name="image">
                  <label class="custom-file-label" for="inputGroupFile">Hotel Image</label>
                </div>
              </div>
              <div class="preview_img">

              </div>
            <button class="btn btn-theme mt-2" >Confirm</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreHotel','#create-form') !!}

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
