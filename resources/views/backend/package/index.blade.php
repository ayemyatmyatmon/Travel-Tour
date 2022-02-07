@extends('backend.layouts.app')
@section('title','Package Page')
@section('package','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
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
    <a href="{{route('package.create')}}" class="btn btn-theme my-2"><i class="fas fa-plus-circle"></i> Create Package</a>

</div>
<div class="card">

    <div class="card-body">
        <table class="table table-bordered Datatable text-center">
            <thead>
                <th>From_To_City</th>
                <th>Duration</th>
                <th>Amount(MMK)</th>
                <th>Person(Count)</th>
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
        "ajax": "/admin/package/datatable/ssd",
        "columns": [
            { data: 'from_to_city', name: 'from_to_city' },
            { data: 'duration', name: 'duration' },
            { data: 'amount', name: 'amount' },
            { data: 'person_quantity', name: 'person_quantity' },
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
                url :'/admin/package/' + id,
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
