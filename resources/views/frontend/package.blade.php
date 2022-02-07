@extends('frontend.travel.master')
@section('content')
<div class="card">

    <div class="card-body p-0">
        <section class="inner-page-banner " style="background-image: url({{$feature_image}})">
            <div class="page-banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 style="color:#fff !important;">tour Packages</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner -->
        <section class="section-spacing">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h2><span>Tours to travel in Myanmar</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row" id="images">

                    @foreach($packages as $package)
                    <div class="col-md-6  col-lg-3 col-sm-6 mb-3" style="padding:2px;">
                        <div class=" destination-card">
                            <div class="grid">
                                <figure class="effect-milo">
                                    <img src="{{asset('storage/package/'.$package->images)}}"
                                        style="width:105% ;height:300px;">

                                    <figcaption>
                                        <h3 class="text-white">{{$package->from_to_city}}</h3>
                                        <p>{{$package->duration}}</p>
                                        <p>{{number_format($package->amount)}}(MMK)</p>
                                        <a href="{{route('user.packagedetail.show',$package->id)}}">View more</a>
                                    </figcaption>
                                </figure>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{ $packages->links() }}
                </div>
            </div>

        </section>

    </div>
</div>
@endsection
