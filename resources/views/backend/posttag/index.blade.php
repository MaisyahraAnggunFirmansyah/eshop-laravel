@extends('backend.layouts.master')

@section('main-content')
<div class="card shadow mb-4 azzahra-card" style="border-radius:12px; border:1px solid #f4d3d8;">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="azzahra-header d-flex justify-content-between align-items-center">
        <span>Post Tag Lists</span>
        <a href="{{route('post-tag.create')}}" class="btn azzahra-btn btn-sm">
            <i class="fas fa-plus"></i> Add Post Tag
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($postTags) > 0)
            <table class="table table-bordered" id="post-tag-dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th style="width:90px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($postTags as $data)
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
                            <a href="{{ route('post-tag.edit',$data->id) }}" class="btn azzahra-btn btn-sm mr-1"
                               style="height:32px; width:32px; border-radius:50%;" data-toggle="tooltip" title="Edit">
                               <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('post-tag.destroy', $data->id) }}" style="display:inline-block;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" data-id="{{ $data->id }}" 
                                        style="height:32px; width:32px; border-radius:50%;" data-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="float-right">{{ $postTags->links() }}</span>
            @else
                <h6 class="text-center">No Post Tag found!!! Please create post tag</h6>
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
    .azzahra-header {
        background: #C97B84;
        color: #fff !important;
        padding: 14px 20px;
        border-radius: 12px 12px 0 0;
        font-size: 18px;
        font-weight: 600;
    }
    .azzahra-btn {
        background: #C97B84 !important;
        border-color: #C97B84 !important;
        color: #fff !important;
        border-radius: 20px;
        padding: 6px 16px;
    }
    .azzahra-btn:hover {
        background: #b76a74 !important;
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
$('#post-tag-dataTable').DataTable({
    "columnDefs":[
        {"orderable":false,"targets":[3,4]}
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
    }).then((willDelete)=>{
        if(willDelete){
            form.submit();
        } else {
            swal("Your data is safe!");
        }
    });
});
</script>
@endpush
