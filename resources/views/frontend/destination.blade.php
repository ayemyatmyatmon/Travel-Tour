@extends('frontend.travel.master')
@section('content')
<div class="card">
    <div class="card-body p-0 ">
        <section class="inner-page-banner" style="background-image: url({{$feature_image}})">
            <div class="page-banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 style="color:#fff !important;">tourist destination</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section-spacing bg-theme">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h2><span>Destinations to travel in Myanmar
                                </span></h2>
                            <p>Here are some of the most popular tourist destinations to travel in Myanmar. Click the
                                link,
                                explore more, contact us for more details and enjoy visiting exploring Myanmar Tours.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($cities as $city)

                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="grid">
                            <figure class="effect-bubba">
                                <img src="{{asset('storage/city/'. (count($city->images ?? []) ? $city->images[0] : null) )}}"
                                    alt="" style="width:100% ;height:300px;">
                                <figcaption>
                                    <h3 class="text-white">{{$city->name}}</h3>
                                    <p>{{Str::limit($city->about,30)}}</p>
                                    <a href="{{route('user.city.show',$city->id)}}">View more</a>
                                </figcaption>
                            </figure>
                        </div>

                    </div>
                    @endforeach

                </div>


            </div>

        </section>
    </div>
</div>
@endsection
