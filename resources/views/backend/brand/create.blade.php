@extends('backend.layouts.master')
@section('title','Azzahra Make Up || Brand Create')
@section('main-content')

<style>
    /* ===== THEME Azzahra Pink ===== */
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
        color: white !important;
        border-radius: 25px !important;
        padding: 6px 18px !important;
        border: none !important;
    }

    .azzahra-btn:hover {
        background: #b86c76 !important;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #f5d7db;
    }

    label {
        font-weight: 600;
        color: #C97B84;
    }

    .btn-warning {
        border-radius: 25px;
    }

    .btn-success {
        background: #C97B84 !important;
        border-radius: 25px;
        border: none !important;
    }

    .btn-success:hover {
        background: #C97B84 !important;
    }
</style>

<div class="card azzahra-card">
    <div class="azzahra-header">
        Add Brand
    </div>

    <div class="card-body">
      <form method="post" action="{{route('brand.store')}}">
        @csrf
        
        {{-- Title --}}
        <div class="form-group">
          <label for="inputTitle">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title" 
                 value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{-- Photo --}}
        <div class="form-group">
            <label for="thumbnail">Photo</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn azzahra-btn">
                        <i class="fa fa-picture-o"></i> Choose Image
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ old('photo') }}">
            </div>
            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
        </div>

        {{-- Status --}}
        <div class="form-group">
          <label for="status">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active" selected>Active</option>
              <option value="inactive">Inactive</option>
          </select>
        </div>

        {{-- Buttons --}}
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
          <button class="btn btn-success" type="submit">Submit</button>
        </div>

      </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
        $('#description').summernote({
            placeholder: "Write short description.....",
            tabsize: 2,
            height: 150
        });
    });
</script>
@endpush
