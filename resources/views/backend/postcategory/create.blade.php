@extends('backend.layouts.master')

@section('main-content')

<div class="card shadow mb-4" style="border-radius:12px; border:1px solid #f4d3d8;">
    <h5 class="card-header" style="background:#C97B84; color:#fff; font-weight:600; border-radius:12px 12px 0 0;">
        Add Post Category
    </h5>
    <div class="card-body">
      <form method="post" action="{{route('post-category.store')}}">
        @csrf

        {{-- Title --}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        {{-- Status --}}
        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control selectpicker" title="--Select status--">
              <option value="active" selected>Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        {{-- Buttons --}}
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning" style="border-radius:20px;">Reset</button>
          <button type="submit" class="btn btn-success" style="background:#C97B84; border-color:#C97B84; border-radius:20px;">Submit</button>
        </div>

      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
$(document).ready(function() {
    $('.selectpicker').selectpicker(); // enable bootstrap select
});
</script>
@endpush
