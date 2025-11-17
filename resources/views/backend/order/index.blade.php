@extends('backend.layouts.master')

@section('main-content')

<style>
    /* ===== Azzahra Theme for Orders Page ===== */
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

    .badge-azzahra-danger {
        background: #e74a3b;
        color: white;
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
        <span>Order Lists</span>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="table-responsive">
            @if(count($orders) > 0)
            <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Order No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Quantity</th>
                        <th>Charge</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th style="width: 90px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)  
                    @php
                        $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
                    @endphp 
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>
                            @foreach($shipping_charge as $data)
                                $ {{number_format($data,2)}}
                            @endforeach
                        </td>
                        <td>${{number_format($order->total_amount,2)}}</td>
                        <td>
                            @if($order->status=='new')
                              <span class="badge badge-azzahra-primary">{{ ucfirst($order->status) }}</span>
                            @elseif($order->status=='process')
                              <span class="badge badge-azzahra-warning">{{ ucfirst($order->status) }}</span>
                            @elseif($order->status=='delivered')
                              <span class="badge badge-azzahra-success">{{ ucfirst($order->status) }}</span>
                            @else
                              <span class="badge badge-azzahra-danger">{{ ucfirst($order->status) }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('order.show',$order->id)}}" class="btn azzahra-btn btn-sm" style="height:32px; width:32px; border-radius:50%;" title="View"><i class="fas fa-eye"></i></a>
                            <a href="{{route('order.edit',$order->id)}}" class="btn azzahra-btn btn-sm" style="height:32px; width:32px; border-radius:50%;" title="Edit"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{route('order.destroy',[$order->id])}}" style="display:inline-block;">
                                @csrf 
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" data-id="{{$order->id}}" style="height:32px; width:32px; border-radius:50%;" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <span class="float-right">{{ $orders->links() }}</span>
            @else
                <h6 class="text-center">No orders found!!!</h6>
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
    $('#order-dataTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [8]
        }]
    });

    // SweetAlert Delete
    $('.dltBtn').click(function(e){
        var form = $(this).closest('form');
        e.preventDefault();
        swal({
            title: "Delete Order?",
            text: "Once deleted, this cannot be restored.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endpush
