@extends('backend.layouts.master')

@section('title','Azzahra Make Up || Banner Page')

@section('main-content')

<style>
    /* ====== Azzahra Global Theme ====== */
    .azzahra-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid #f5d7db;
        box-shadow: 0 4px 10px rgba(201, 123, 132, 0.15);
    }

    .azzahra-header {
        background: #C97B84;
        border-radius: 14px 14px 0 0;
        padding: 18px 20px;
        color: white;
        font-size: 18px;
        font-weight: 600;
    }

    .azzahra-btn {
        background: #C97B84 !important;
        border-color: #C97B84 !important;
        color: white !important;
        border-radius: 25px !important;
        padding: 6px 18px !important;
        font-weight: 500;
    }

    table thead {
        background: #f9e4e7;
        color: #C97B84;
        font-weight: 600;
    }

    .badge-success {
        background: #7CB342 !important;
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
    }

    .badge-warning {
        background: #e5c07b !important;
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
    }

    .btn-action {
        height: 35px !important;
        width: 35px !important;
        border-radius: 50% !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-edit {
        background: #C97B84 !important;
        border: none;
        color: white !important;
    }

    .btn-delete {
        background: #d9534f !important;
        border: none;
        color: white !important;
    }

    .zoom {
        transition: transform .2s;
    }

    .zoom:hover {
        transform: scale(3.2);
    }
</style>


<div class="card shadow mb-4 azzahra-card">

    <div class="azzahra-header">
        Banner List
        <a href="{{ route('banner.create') }}" class="btn azzahra-btn btn-sm float-right">
            <i class="fas fa-plus"></i> Add Banner
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            @include('backend.layouts.notification')

            @if($banners->count() > 0)

            <table class="table table-bordered" id="banner-dataTable">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($banners as $key => $banner)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->slug }}</td>

                            <td>
                                @if($banner->photo)
                                    <img src="{{ $banner->photo }}" 
                                         class="img-fluid zoom" 
                                         style="max-width:80px;">
                                @else
                                    <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" 
                                         class="img-fluid zoom" 
                                         style="max-width:80px;">
                                @endif
                            </td>

                            <td>
                                @if($banner->status == 'active')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-warning">Inactive</span>
                                @endif
                            </td>

                            <td class="d-flex justify-content-center">

                                {{-- Edit --}}
                                <a href="{{ route('banner.edit', $banner->id) }}"
                                   class="btn btn-action btn-edit mr-2"
                                   data-toggle="tooltip">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Delete --}}
                                <form method="POST" action="{{ route('banner.destroy', $banner->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-action btn-delete dltBtn"
                                            data-id="{{ $banner->id }}"
                                            data-toggle="tooltip">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <span class="float-right">{{ $banners->links() }}</span>

            @else

            <h6 class="text-center">No banners found. Please create one.</h6>

            @endif

        </div>
    </div>

</div>

@endsection



@push('styles')
<link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush



@push('scripts')

<script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
$('#banner-dataTable').DataTable({
    "columnDefs": [
        { "orderable": false, "targets": [3,4,5] }
    ]
});
</script>

<script>
$(document).ready(function(){
    $('.dltBtn').click(function(e){
        e.preventDefault();
        let form = $(this).closest('form');

        swal({
            title: "Are you sure?",
            text: "This banner will be removed permanently!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((yes)=>{
            if(yes){
                form.submit();
            }
        });
    });
});
</script>

@endpush
