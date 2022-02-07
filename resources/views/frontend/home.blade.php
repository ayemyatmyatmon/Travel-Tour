@extends('frontend.travel.master')
@section('title','')
@section('content')
<div class="card">

    <div class="card-body " style="padding:0px !important;">
        <section class="carousel slide" id="banner" data-ride="carousel" data-pause="false">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image:url(imgs/slide1.jpg)">
                    <div class="banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="hero-text bg-theme">
                                        <h6 class="animated fadeInDown">Welcome to AMMM Travel and Tour</h6>
                                        <h1 class="animated fadeInUp">Best travel agency</h1>
                                        <p class="animated fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Vestibulum tincidunt ullamcorper magna, in tincidunt ex auctor et.</p>
                                        <a href="{{route('contact')}}"
                                            class="btn btn-primary animated fadeInRight">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image:url(imgs/slide2.jpg)">
                    <div class="banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="hero-text bg-theme">
                                        <h6 class="animated fadeInLeft">Welcome to AMMM Travel and Tour</h6>
                                        <h1 class="animated fadeInLeft">Trusted Travel Agency</h1>
                                        <p class="animated fadeInLeft">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Vestibulum tincidunt ullamcorper magna, in tincidunt ex
                                            auctor et.</p>
                                        <a href="{{route('contact')}}"
                                            class="btn btn-primary animated fadeInLeft">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image:url(imgs/slide3.jpg)">
                    <div class="banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="hero-text bg-theme">
                                        <h6 class="animated fadeInRight">Welcome to AMMM Travel and Tour</h6>
                                        <h1 class="animated fadeInRight">Get Exclusive Tour</h1>
                                        <p class="animated fadeInRight">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Vestibulum tincidunt ullamcorper magna, in tincidunt ex
                                            auctor et.</p>
                                        <a href="{{route('contact')}}"
                                            class="btn btn-primary animated fadeInRight">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ol class="carousel-indicators">
                    <li data-target="#banner" data-slide-to="0" class="active"></li>
                    <li data-target="#banner" data-slide-to="1"></li>
                    <li data-target="#banner" data-slide-to="2"></li>
                </ol>
            </div>
        </section>
        <!-- Tour To travel in myanmar -->
        <div>
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
                        <div class="col-md-3 mb-3" style="padding:2px;">

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




        <!-- end Tour To travel in myanmar -->
        {{-- destination in myanmar --}}
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

        {{-- end destination in myanmar --}}

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
