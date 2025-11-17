@extends('backend.layouts.master')
@section('title','Azzahra Make Up || Comment Page')
@section('main-content')

<style>
    /* ====== GLOBAL Azzahra Theme ====== */
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
        justify-content: center;
        align-items: center;
    }
    .btn-edit {
        background: #C97B84 !important;
        color: white !important;
        border: none;
    }
    .btn-delete {
        background: #d9534f !important;
        color: white !important;
        border: none;
    }
</style>

<div class="card shadow mb-4 azzahra-card">

    <div class="azzahra-header">
        Comment List
    </div>

    <div class="card-body">
        @include('backend.layouts.notification')
        
        <div class="table-responsive">
            @if(count($comments) > 0)
            <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Author</th>
                        <th>Post Title</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->user_info['name']}}</td>
                        <td>{{$comment->post->title}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->created_at->format('M d Y, g:i a')}}</td>

                        <td>
                            @if($comment->status=='active')
                                <span class="badge badge-success">{{$comment->status}}</span>
                            @else
                                <span class="badge badge-warning">{{$comment->status}}</span>
                            @endif
                        </td>

                        <td class="d-flex">

                            {{-- Edit --}}
                            <a href="{{route('comment.edit',$comment->id)}}" 
                               class="btn btn-action btn-edit mr-2"
                               data-toggle="tooltip" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- Delete --}}
                            <form method="POST" action="{{route('comment.destroy',[$comment->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-action btn-delete dltBtn"
                                        data-id="{{$comment->id}}"
                                        data-toggle="tooltip"
                                        title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <span style="float:right">{{$comments->links()}}</span>
            @else
                <h6 class="text-center">No post comments found!</h6>
            @endif
        </div>
    </div>
</div>

@endsection


@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
@endpush

@push('scripts')
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
$('#order-dataTable').DataTable({
    "columnDefs": [
        { "orderable": false, "targets": [5,6] }
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
            text: "This comment will be deleted permanently.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((yes)=>{
            if(yes){
                form.submit();
            }
        });
    });
});
</script>
@endpush
