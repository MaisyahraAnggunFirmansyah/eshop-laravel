@extends('backend.layouts.master')

@section('main-content')

<div class="card shadow mb-4" style="border-radius:12px; border:1px solid #f4d3d8;">
    
    <!-- Header -->
    <div class="card-header d-flex justify-content-between align-items-center" style="background:#C97B84; color:#fff; font-weight:600; border-radius:12px 12px 0 0;">
        <span>Post Category List</span>
        <a href="{{route('post-category.create')}}" class="btn btn-sm" style="background:#fff; color:#C97B84; border-radius:20px;">
            <i class="fas fa-plus"></i> Add Post Category
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="table-responsive">
            @if(count($postCategories) > 0)
            <table class="table table-bordered" id="post-category-dataTable" width="100%" cellspacing="0">
                <thead style="background:#f7e4e7; color:#C97B84; font-weight:bold;">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($postCategories as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->slug }}</td>
                        <td>
                            @if($data->status=='active')
                                <span class="badge badge-azzahra-success">{{ $data->status }}</span>
                            @else
                                <span class="badge badge-azzahra-warning">{{ $data->status }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('post-category.edit',$data->id) }}" class="btn btn-sm" style="height:32px; width:32px; border-radius:50%; background:#C97B84; color:#fff;" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('post-category.destroy',$data->id) }}" style="display:inline-block;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm dltBtn" data-id="{{ $data->id }}" style="height:32px; width:32px; border-radius:50%; background:#e74c3c; color:#fff;" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <span class="float-right">{{ $postCategories->links() }}</span>

            @else
            <h6 class="text-center">No Post Category found! Please create one.</h6>
            @endif
        </div>
    </div>

</div>

@endsection

@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<style>
    div.dataTables_wrapper div.dataTables_paginate{
        display: none;
    }
    .badge-azzahra-success {
        background: #8ec5a3;
        color: #fff;
    }
    .badge-azzahra-warning {
        background: #f7c7cc;
        color: #a94955;
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
$('#post-category-dataTable').DataTable({
    "columnDefs":[
        { "orderable": false, "targets": [3,4] }
    ]
});

$('.dltBtn').click(function(e){
    var form = $(this).closest('form');
    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete)=>{
        if (willDelete) {
            form.submit();
        }
    });
});
</script>
@endpush
