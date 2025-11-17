@extends('backend.layouts.master')

@section('title','Azzahra Make Up || Add Coupon')

@section('main-content')

<div class="card shadow mb-4 border-0" style="border-radius: 12px;">
    <h5 class="card-header text-white" 
        style="background: linear-gradient(90deg, #C97B84, #e56bb1); border-radius: 12px 12px 0 0;">
        Add Coupon
    </h5>

    <div class="card-body">

        <form method="POST" action="{{ route('coupon.store') }}">
            @csrf

            {{-- Coupon Code --}}
            <div class="form-group">
                <label for="code" class="col-form-label font-weight-bold text-purple">Coupon Code 
                    <span class="text-danger">*</span>
                </label>
                <input id="code" type="text" name="code" placeholder="Enter coupon code"
                       class="form-control border-purple" value="{{ old('code') }}">
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Type --}}
            <div class="form-group">
                <label for="type" class="col-form-label font-weight-bold text-purple">Type 
                    <span class="text-danger">*</span>
                </label>
                <select name="type" id="type" class="form-control border-purple">
                    <option value="fixed" {{ old('type')=='fixed' ? 'selected' : '' }}>Fixed</option>
                    <option value="percent" {{ old('type')=='percent' ? 'selected' : '' }}>Percent</option>
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Value --}}
            <div class="form-group">
                <label for="value" class="col-form-label font-weight-bold text-purple">Value 
                    <span class="text-danger">*</span>
                </label>
                <input id="value" type="number" name="value" placeholder="Enter coupon value"
                       class="form-control border-purple" value="{{ old('value') }}">
                @error('value')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status" class="col-form-label font-weight-bold text-purple">Status 
                    <span class="text-danger">*</span>
                </label>
                <select name="status" id="status" class="form-control border-purple">
                    <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="form-group mt-4">
                <button type="reset" class="btn btn-outline-purple px-4">Reset</button>
                <button type="submit" class="btn btn-purple px-4">Submit</button>
            </div>

        </form>
    </div>
</div>

@endsection

@push('styles')
<style>
    .text-purple { color: #C97B84 !important; }
    .border-purple { border: 2px solid #f1aadd; }
    .btn-purple {
        background: linear-gradient(90deg, #C97B84, #e56bb1);
        color: white;
        border-radius: 6px;
    }
    .btn-outline-purple {
        border: 2px solid #C97B84;
        color: #C97B84;
        border-radius: 6px;
    }
    .btn-outline-purple:hover {
        background: #C97B84;
        color: #fff;
    }
</style>
@endpush

@push('scripts')
@endpush
