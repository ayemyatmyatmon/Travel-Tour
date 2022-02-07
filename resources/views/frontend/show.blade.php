@extends('frontend.travel.master')
@section('content')
<div class="card ">

    <div class="card-body p-0">
        <section class="inner-page-banner mb-4 detail" style="background-image:url('{{$feature_image}}')">
            <div class="page-banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ">
                            <h2 style="text-align: center ;color:white !important;">{{$city->name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner -->
        <div class="card-body bg-theme">
            <div class="container">
                <div class="allpadding">
                    <div>
                        <h2 class="text-center">{{$city->name}}</h2>
                        <div style="width:10%;height:5px;background:#8bc34a;margin:auto;"></div>
                    </div>

                    <div class=" my-3">
                        <div class="showcontainer">

                            @foreach($city->images ?? [] as $image)
                            <div class=" panel" style="background-image: url({{asset('storage/city/'.$image)}});">
                            </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="mt-5">
                        <p class="p-0">{{$city->about}}</p>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
    const panels = document.querySelectorAll('.panel');

panels.forEach((panel) => {
    panel.addEventListener('click', () => {
        removeActiveClasses();
        panel.classList.add('active');
    });
});

function removeActiveClasses() {
    panels.forEach(panel => {
        panel.classList.remove('active');
    });
}
</script>
@endsection
