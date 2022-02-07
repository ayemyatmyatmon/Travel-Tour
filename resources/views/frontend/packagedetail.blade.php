@extends('frontend.travel.master')
@section('content')
<div class="card " >

    <div class="card-body  p-0 " >

        <section class="inner-page-banner mb-4 detail" style="background-image:url('{{$feature_image}}')">

        </section>
        <!-- end banner -->
            <div class="card-body bg-theme" >
                <div class="container allpadding">
                        @foreach ($packagedetails as $packagedetail )
                        <div class="row d-flex justify-content-between " >

                            <div class="col-md-8">
                                <h3>{{$packagedetail->title}}</h3>
                                <p>{{$packagedetail->description}}</p>
                            </div>

                            <div class="col-md-4 ">
                                    <div class="hover14 column">
                                    <div>
                                        <figure><img src="{{$packagedetail->image_path()}}" class="packagedetailimage" /></figure>
                                    </div>
                                    {{-- <img src="{{$packagedetail->image_path()}}" class="packagedetailimage"> --}}
                            </div>

                        </div>

                        @endforeach

                </div>

            </div>


    </div>
</div>
@endsection

