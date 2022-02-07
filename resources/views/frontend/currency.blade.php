@extends('frontend.travel.master')
@section('title','')
@section('content')

<div class="card " style="padding-top:150px;padding-bottom:100px;">
    <div class="card-body">

        <div class="container">
            <div class="card" style="padding:20px;border:1px solid #ddd;">
                <div class="text-center">
                    <img src="{{asset('imgs/central.png')}}" >
                    <p class="mb-0">{{$currency['info']}}</p>
                    <p>Reference Exchange Rage
                        ({{'Carbon\Carbon'::createFromTimeStamp($currency['timestamp'])->format('y-m-d')}})</p>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        Country
                    </div>
                    <div class="col-md-3 text-center">
                        Currency
                    </div>
                    <div class="col-md-3 text-center">
                        Rate
                    </div>
                </div>

                <div class="row p-3 bg-light">
                    <div class="col-md-6">
                        <img src="{{asset('imgs/usd.png')}}" style="width:35px;">
                        <span>USD United State Dollar</span>
                    </div>
                    <div class="col-md-3 text-center">
                        USD
                    </div>
                    <div class="col-md-3 text-center">
                        {{$currency['rates']['USD']}}
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6">
                        <img src="{{asset('imgs/EU-European-Union-Flag-icon.png')}}" style="width:35px;">
                        <span>Euro</span>
                    </div>
                    <div class="col-md-3 text-center">
                        EUR
                    </div>
                    <div class="col-md-3 text-center">
                        {{$currency['rates']['EUR']}}
                    </div>
                </div>

                <div class="row p-3 bg-light">
                    <div class="col-md-6">
                        <img src="{{asset('imgs/thaiflag.png')}}" style="width:35px;">
                        <span>Thai Bhat</span>
                    </div>
                    <div class="col-md-3 text-center">
                        THI
                    </div>
                    <div class="col-md-3 text-center">
                        {{$currency['rates']['THB']}}
                    </div>
                </div>

                <div class="row p-3 ">
                    <div class="col-md-6">
                        <img src="{{asset('imgs/2560px-Flag_of_Japan.svg.png')}}" style="width:35px;">
                        <span>Japanese Yen</span>
                    </div>
                    <div class="col-md-3 text-center">
                        JPY
                    </div>
                    <div class="col-md-3 text-center">
                        {{$currency['rates']['JPY']}}
                    </div>
                </div>

                <div class="row p-3 bg-light">
                    <div class="col-md-6">
                        <img src="{{asset('imgs/singapore.jpeg')}}" style="width:35px;">
                        <span>Singapore Dollar</span>
                    </div>
                    <div class="col-md-3 text-center">
                        SGD
                    </div>
                    <div class="col-md-3 text-center">
                        {{$currency['rates']['SGD']}}
                    </div>
                </div>

                <div class="row p-3">
                    <div class="col-md-6">
                        <img src="{{asset('imgs/2100px-Flag_of_Malaysia_(3-2).svg.png')}}" style="width:35px;">
                        <span>Malaysian Ringgit</span>
                    </div>
                    <div class="col-md-3 text-center">
                        MYR
                    </div>
                    <div class="col-md-3 text-center">
                        {{$currency['rates']['MYR']}}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        new Viewer(document.getElementById('images'));

    })
</script>

@endsection
