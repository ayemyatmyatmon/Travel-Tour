@extends('backend.layouts.app')
@section('title','Cities Page')
@section('schedule','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-map icon-gradient bg-mean-fruit">
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
    <a class="back-btn btn btn-dark  text-white" >Back</a>
    <a href="{{route('schedule.create')}}" class="btn btn-theme my-2"><i class="fas fa-plus-circle"></i> Create Bus Schedule</a>

</div>
<div class="card">

    <div class="card-body">
        <table class="table table-bordered Datatable text-center">
            <thead>
                {{-- <th>Image</th> --}}
                <th>Bus Operator Name</th>
                <th>Departure City</th>
                <th>Arrival City</th>
                <th>Day</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>

                <th>Action</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>
@endsection
@section('scripts')
<script>

    $(function() {
    var table= $('.Datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/schedule/datatable/ssd",
        "columns": [
            { data: 'busoperator_name', name: 'busoperator_name' },
            { data: 'departure_city', name: 'departure_city' },
            { data: 'arrival_city', name: 'arrival_city' },
            { data: 'day_name', name: 'day_name' },
            { data: 'departure_time', name: 'departure_time' },
            { data: 'arrival_time', name: 'arrival_time' },

            { data: 'action', name: 'action' },


        ]
    });
})

$(document).on('click','.Delete',function(){
    var id=$(this).data('id');
    Swal.fire({

        title: 'Are you sure?',
        text: "You won't be able to Delete this!",
        icon: 'warning',
        showCancelButton: true,
        reverseButtons:true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url :'/admin/schedule/' + id,
                type :'DELETE',
                success:function(){
                    location.reload();

                }

            })
        }
        })
   })

</script>

@endsection
