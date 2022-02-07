@extends('frontend.travel.master')
@section('extra.css')
<style>
    .seat_available {
        background: #8bc34a !important;
    }
</style>
@endsection
@section('content')
<div class="seatselect bus-page-banner-caption" style="padding-top:150px;padding-bottom:100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        Booking Detail
                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>Bus Operator</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Date</th>
                                <th>Departure Time</th>

                            </thead>
                            <tbody>
                                <tr >
                                    <td>{{$bookingdetail->schedule->bus_operator ? $bookingdetail->schedule->bus_operator->name:''}}</td>
                                    <td>{{$bookingdetail->schedule->from_city ? $bookingdetail->schedule->from_city->name:''}}</td>
                                    <td>{{$bookingdetail->schedule->to_city ? $bookingdetail->schedule->to_city->name:''}}</td>
                                    <td>{{$bookingdetail->booking->day}}</td>
                                    <td>{{$bookingdetail->schedule->departure_time ? 'Carbon\Carbon'::parse($bookingdetail->schedule->departure_time)->format('H:m:s A'):''}}</td>
                                </tr>
                            </tbody>

                        </table>
                        <div>
                            <div>
                                <span>Name :</span>
                                <span>{{$bookingdetail->booking->name}}</span>
                            </div>
                            <div>
                                <span>Phone :</span>
                                <span>{{$bookingdetail->booking->phone}}</span>
                            </div>
                            <div>
                                <span>Seat Count :</span>
                                <span>{{$bookingdetail->booking->seat_count}}</span>
                            </div>
                            <div>
                                <span>Seat Number :</span>
                                <span>{{$bookingdetail->booking->seat_number}}</span>
                            </div>
                            <div>
                                <span>Total Price :</span>
                                <span>{{number_format($bookingdetail->booking ? $bookingdetail->booking->price:'')}} MMK</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreBooking','#create-form') !!}

<script>
    $("document").ready(function(){
        var seat_count = {{request()->seat}};
        $('.seat-btn').on('click',function(e){
            e.preventDefault();
            if($('.seat_available').length < seat_count){
                $(this).toggleClass('seat_available');

                var seat_numbers = [];
                $('.seat_available').each(function(each){
                    seat_numbers.push($(this).data('seat-number'));
                });

                $(".countseat").html(seat_numbers.join(', ')) ;
            }
        });

    });
</script>

@endsection
