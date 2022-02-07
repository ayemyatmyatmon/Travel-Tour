@extends('frontend.travel.master')
@section('content')
<div class="card">

    <div class="card-body p-0">
        <section class="inner-page-banner contactus">
            <div class="page-banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center" >
                            <h2 style="color:#fff !important;">Contact</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner -->



    </div>

</div>
<div class="card bg-theme allpadding">
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <form action="{{route('contactus.store')}}" method="POST" id="create-form" >
                        @csrf
                        <div class="form-group">
                            <label>Your Name (required)</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Your Email (required)</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Your Message</label>
                            <textarea class="form-control" name="message" ></textarea>
                        </div>
                        <button class="btn btn-theme">send</button>
                    </form>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div>
                        <h3>Contact</h3>
                        <p>We are very approachable and would love to speak to you.Feel free to call, send us an E-mail, Tweet us or simply complete the enquiry form.</p>
                    </div>
                    <div>
                        <i class="fas fa-map-marked-alt"></i>
                        <span>No. 209, Room 300 A, Mayangone Township, Yangon, Myanmar.</span>
                    </div>

                </div>
            </div>


        </div>
    </div>

</div>

@endsection
@section('scripts')

{!! JsValidator::formRequest('App\Http\Requests\StoreContactUs','#create-form') !!}

@endsection
