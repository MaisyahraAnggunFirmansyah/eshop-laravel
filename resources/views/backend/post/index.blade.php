@extends('backend.layouts.master')

@section('main-content')

<style>
    /* ===== Azzahra Theme for Table Page ===== */
    .azzahra-header {
        background: #C97B84;
        color: #fff !important;
        padding: 14px 20px;
        border-radius: 10px 10px 0 0;
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

    .azzahra-card {
        border: 1px solid #f4d3d8;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(201, 123, 132, 0.2);
    }

    .badge-azzahra-primary {
        background: #C97B84;
        color: white;
    }

    .badge-azzahra-warning {
        background: #f7c7cc;
        color: #a94955;
    }

    .badge-azzahra-success {
        background: #8ec5a3;
        color: #ffffff;
    }

    .table thead {
        background: #f7e4e7;
        color: #C97B84;
        font-weight: bold;
    }

    .zoom {
        transition: transform .2s;
    }

    .zoom:hover {
        transform: scale(5);
    }
</style>

<div class="card shadow mb-4 azzahra-card">

    <!-- Header -->
    <div class="azzahra-header d-flex justify-content-between align-items-center">
        <span>Post Lists</span>
        <a href="{{route('post.create')}}" class="btn azzahra-btn btn-sm">
            <i class="fas fa-plus"></i> Add Post
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="table-responsive">
        @if(count($posts) > 0)
            <table class="table table-bordered" id="post-dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Tag</th>
                        <th>Author</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    @php
                        $author_info = DB::table('users')->select('name')->where('id', $post->added_by)->get();
                    @endphp
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->cat_info->title }}</td>
                        <td>{{ $post->tags }}</td>
                        <td>
                            @foreach($author_info as $data)
                                {{ $data->name }}
                            @endforeach
                        </td>
                        <td>
                            @if($post->photo)
                                <img src="{{ $post->photo }}" class="img-fluid zoom" style="max-width:80px" alt="{{ $post->photo }}">
                            @else
                                <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                            @endif
                        </td>
                        <td>
                            @if($post->status == 'active')
                                <span class="badge badge-azzahra-success">{{ $post->status }}</span>
                            @else
                                <span class="badge badge-azzahra-warning">{{ $post->status }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('post.edit', $post->id) }}"
                               class="btn azzahra-btn btn-sm"
                               style="height:32px; width:32px; border-radius:50%; padding:4px;">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form method="POST" action="{{ route('post.destroy', [$post->id]) }}" style="display:inline-block;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn"
                                        style="height:32px; width:32px; border-radius:50%; padding:4px;"
                                        data-id="{{ $post->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <span class="float-right">{{ $posts->links() }}</span>

        @else
            <h6 class="text-center">No posts found!!! Please create Post</h6>
        @endif
        </div>
    </div>
</div>

@endsection

@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush

@push('scripts')
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
$('#post-dataTable').DataTable({
    "columnDefs":[{ "orderable": false, "targets":[7] }]
});

// SweetAlert Delete
$('.dltBtn').click(function(e){
    var form = $(this).closest('form');
    e.preventDefault();
    swal({
        title: "Delete Post?",
        text: "Once deleted, this cannot be restored.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete)=>{
        if (willDelete) { form.submit(); }
    });
});
</script>
@endpush
