@extends('backend.layouts.master')

@section('main-content')

<div class="card shadow mb-4" style="border-radius:12px; border:1px solid #f4d3d8;">
    <h5 class="card-header" style="background:#C97B84; color:#fff; font-weight:600; border-radius:12px 12px 0 0;">
        Edit Post Category
    </h5>
    <div class="card-body">
      <form method="post" action="{{route('post-category.update',$postCategory->id)}}">
        @csrf 
        @method('PATCH')

        {{-- Title --}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{$postCategory->title}}" class="form-control">
          @error('title') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        {{-- Status --}}
        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control selectpicker" title="--Select status--">
              <option value="active" {{($postCategory->status=='active') ? 'selected' : ''}}>Active</option>
              <option value="inactive" {{($postCategory->status=='inactive') ? 'selected' : ''}}>Inactive</option>
          </select>
          @error('status') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        {{-- Button --}}
        <div class="form-group mb-3">
          <button class="btn btn-success" type="submit" style="background:#C97B84; border-color:#C97B84; border-radius:20px;">Update</button>
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
