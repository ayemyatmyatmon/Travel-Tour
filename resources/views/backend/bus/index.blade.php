@extends('backend.layouts.app')
@section('title','Car Page')
@section('bus','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
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
    <a href="{{route('bus.create')}}" class="btn btn-theme my-2"><i class="fas fa-plus-circle"></i> Create Bus Operator</a>

</div>
<div class="card">

    <div class="card-body">
        <table class="table table-bordered Datatable text-center">
            <thead>
                <th>Logo</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Updated At</th>
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
        "ajax": "/admin/bus/datatable/ssd",
        "columns": [
            { data: 'logo', name: 'logo' },
            { data: 'name', name: 'name' },
            { data: 'amount', name: 'amount' },
            { data: 'updated_at', name: 'updated_at' },
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
                url :'/admin/bus/' + id,
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
