@extends('backend.layouts.master')

@section('main-content')

<div class="card shadow mb-4" style="border-radius:12px; border:1px solid #f4d3d8;">
    <h5 class="card-header" style="background:#C97B84; color:#fff; font-weight:600; border-radius:12px 12px 0 0;">
        Edit Post Tag
    </h5>
    <div class="card-body">
      <form method="post" action="{{route('post-tag.update',$postTag->id)}}">
        @csrf 
        @method('PATCH')

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{$postTag->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control">
            <option value="active" {{ $postTag->status=='active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $postTag->status=='inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
           <button type="reset" class="btn btn-warning" style="border-radius:20px;">Reset</button>
           <button class="btn btn-success" type="submit" style="background:#C97B84; border-color:#C97B84; border-radius:20px;">Update</button>
        </div>

      </form>
    </div>
</div>

@endsection
