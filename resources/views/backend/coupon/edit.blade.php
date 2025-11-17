@extends('backend.layouts.master')

@section('main-content')

<div class="card shadow mb-4 border-0" style="border-radius: 12px;">
    <h5 class="card-header text-white" 
        style="background: linear-gradient(90deg, #C97B84, #e56bb1); border-radius: 12px 12px 0 0;">
        Edit Coupon
    </h5>

    <div class="card-body">

        <form method="POST" action="{{ route('coupon.update', $coupon->id) }}">
            @csrf 
            @method('PATCH')

            {{-- Coupon Code --}}
            <div class="form-group">
                <label for="inputTitle" class="col-form-label font-weight-bold text-purple">
                    Coupon Code <span class="text-danger">*</span>
                </label>
                <input id="inputTitle" type="text" name="code" placeholder="Enter Coupon Code"
                       value="{{ $coupon->code }}" class="form-control border-purple">
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Type --}}
            <div class="form-group">
                <label for="type" class="col-form-label font-weight-bold text-purple">
                    Type <span class="text-danger">*</span>
                </label>
                <select name="type" class="form-control border-purple">
                    <option value="fixed" {{ $coupon->type=='fixed' ? 'selected' : '' }}>Fixed</option>
                    <option value="percent" {{ $coupon->type=='percent' ? 'selected' : '' }}>Percent</option>
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Value --}}
            <div class="form-group">
                <label for="value" class="col-form-label font-weight-bold text-purple">
                    Value <span class="text-danger">*</span>
                </label>
                <input id="value" type="number" name="value" placeholder="Enter Coupon value"
                       value="{{ $coupon->value }}" class="form-control border-purple">
                @error('value')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status" class="col-form-label font-weight-bold text-purple">
                    Status <span class="text-danger">*</span>
                </label>
                <select name="status" class="form-control border-purple">
                    <option value="active" {{ $coupon->status=='active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $coupon->status=='inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Button --}}
            <div class="form-group mt-4">
                <button class="btn btn-purple px-4" type="submit">Update</button>
            </div>

        </form>
    </div>
</div>

@endsection

@push('styles')
<style>
    .text-purple { color: #C97B84 !important; }

    .border-purple { 
        border: 2px solid #f1aadd !important; 
        border-radius: 6px;
    }

    .btn-purple {
        background: linear-gradient(90deg, #C97B84, #e56bb1);
        color: white !important;
        border-radius: 6px;
        font-weight: bold;
    }
</style>
@endpush

@push('scripts')
{{-- Tidak ada Summernote atau file manager karena tidak digunakan --}}
@endpush
