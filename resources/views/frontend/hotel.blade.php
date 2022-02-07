@extends('frontend.travel.master')
@section('content')
<div class="card">

    <div class="card-body p-0 ">
        <section class="inner-page-banner" style="background-image:url({{asset('imgs/hotel.jpg')}})">
            <div class="page-banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center" >
                            <h2 style="color:#fff !important;">Hotels</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner -->
        <section class="section-spacing" style="border-bottom:1px solid #a4d26b">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h2><span>Tours to travel in Myanmar</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($hotels as $hotel)
                    <div class="col-md-4 mb-3" style="padding:2px;">
                        <div class="card hotel" >
                            <img src="{{asset('storage/hotel/'.$hotel->image)}}" alt="" style="height: 300px !important;">

                            <div class="card-body bg-theme">
                                <h3 class="card-title" ><a href="tour-single.html">{{$hotel->name}}</a></h3>
                                <a href="#" class="btn btn-theme btn-sm" >Detail</a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
