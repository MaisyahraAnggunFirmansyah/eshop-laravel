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
</style>

<div class="card shadow mb-4 azzahra-card">

    <!-- Header -->
    <div class="azzahra-header d-flex justify-content-between align-items-center">
        <span>Coupon List</span>
        <a href="{{route('coupon.create')}}" class="btn azzahra-btn btn-sm">
            <i class="fas fa-plus"></i> Add Coupon
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="table-responsive">

            @if(count($coupons) > 0)
            <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Coupon Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Status</th>
                        <th style="width: 90px;">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->code }}</td>

                        <td>
                            @if($coupon->type == 'fixed')
                                <span class="badge badge-azzahra-primary">Fixed</span>
                            @else
                                <span class="badge badge-azzahra-warning">Percent</span>
                            @endif
                        </td>

                        <td>
                            @if($coupon->type == 'fixed')
                                Rp{{ number_format($coupon->value, 0) }}
                            @else
                                {{ $coupon->value }}%
                            @endif
                        </td>

                        <td>
                            @if($coupon->status == 'active')
                                <span class="badge badge-azzahra-success">Active</span>
                            @else
                                <span class="badge badge-azzahra-warning">Inactive</span>
                            @endif
                        </td>

                        <td class="text-center">

                            <a href="{{ route('coupon.edit', $coupon->id) }}"
                                class="btn azzahra-btn btn-sm"
                                style="height:32px; width:32px; border-radius:50%; padding:4px;">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form method="POST"
                                  action="{{ route('coupon.destroy', $coupon->id) }}"
                                  style="display:inline-block;">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger btn-sm dltBtn"
                                        style="height:32px; width:32px; border-radius:50%; padding:4px;"
                                        data-id="{{ $coupon->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            {{-- Pagination --}}
            <span class="float-right">{{ $coupons->links() }}</span>

            @else
                <h6 class="text-center">No Coupons found. Please create one.</h6>
            @endif
        </div>
    </div>

</div>
@endsection


@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush


@push('scripts')
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    $('#banner-dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [4,5]
        }]
    });

    // SweetAlert Delete
    $('.dltBtn').click(function(e){
        var form = $(this).closest('form');
        e.preventDefault();

        swal({
            title: "Delete Coupon?",
            text: "Once deleted, this cannot be restored.",
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
