@extends('backend.layouts.master')
@section('title','Azzahra Make Up || Category Page')
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

    .azzahra-btn {
        background: #C97B84 !important;
        border-color: #C97B84 !important;
        color: white !important;
        border-radius: 25px !important;
        padding: 6px 18px !important;
        font-weight: 500;
    }

    .azzahra-btn:hover {
        background: #b86c76 !important;
    }

    /* Table */
    table thead {
        background: #f9e4e7;
        color: #C97B84;
        font-weight: 600;
    }

    .badge-success {
        background: #7CB342 !important; /* soft green */
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
    }

    .badge-warning {
        background: #e5c07b !important; /* soft gold */
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
    }

    /* Action Buttons */
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
</style>


<div class="card shadow mb-4 azzahra-card">

    <div class="azzahra-header">
        Category List
        <a href="{{route('category.create')}}" class="btn azzahra-btn btn-sm float-right">
            <i class="fas fa-plus"></i> Add Category
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            @include('backend.layouts.notification')

            @if(count($categories)>0)
            <table class="table table-bordered" id="category-dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Is Parent</th>
                        <th>Parent Category</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>

                        <td>{{ $category->is_parent == 1 ? 'Yes' : 'No' }}</td>

                        <td>{{ $category->parent_info->title ?? '-' }}</td>

                        <td>
                            @if($category->photo)
                              <img src="{{$category->photo}}" style="max-width:80px;" class="img-fluid rounded">
                            @else
                              <img src="{{asset('backend/img/thumbnail-default.jpg')}}" style="max-width:80px;" class="img-fluid rounded">
                            @endif
                        </td>

                        <td>
                            @if($category->status=='active')
                                <span class="badge badge-success">{{$category->status}}</span>
                            @else
                                <span class="badge badge-warning">{{$category->status}}</span>
                            @endif
                        </td>

                        <td class="d-flex">

                            {{-- Edit --}}
                            <a href="{{route('category.edit',$category->id)}}"
                               class="btn btn-action btn-edit mr-2" 
                               data-toggle="tooltip" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- Delete --}}
                            <form method="POST" action="{{route('category.destroy',$category->id)}}">
                                @csrf 
                                @method('delete')
                                <button class="btn btn-action btn-delete dltBtn"
                                        data-id={{$category->id}}
                                        data-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <span style="float:right">{{$categories->links()}}</span>

            @else
              <h6 class="text-center">No categories found! Please create one.</h6>
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
$('#category-dataTable').DataTable({
    "columnDefs":[
        {"orderable":false, "targets":[4,5,7]}
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
            text: "This data will be deleted permanently.",
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
