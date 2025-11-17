@extends('backend.layouts.master')

@section('main-content')

<style>
    /* ====== GLOBAL Azzahra Theme ====== */
    .azzahra-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid #f5d7db;
        box-shadow: 0 4px 10px rgba(201, 123, 132, 0.15);
        padding-bottom: 20px;
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
</style>


<div class="card azzahra-card">

    <div class="azzahra-header">
        Edit Category
    </div>

    <div class="card-body">

      <form method="post" action="{{ route('category.update', $category->id) }}">
        @csrf 
        @method('PATCH')

        {{-- Title --}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" class="form-control"
                 placeholder="Enter category title" value="{{ $category->title }}">
          @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Summary --}}
        <div class="form-group">
          <label for="summary" class="col-form-label">Summary</label>
          <textarea class="form-control" id="summary" name="summary">{{ $category->summary }}</textarea>
          @error('summary') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Is Parent --}}
        <div class="form-group">
          <label for="is_parent">Is Parent</label><br>
          <input type="checkbox" name="is_parent" id="is_parent" value="1"
            {{ $category->is_parent == 1 ? 'checked' : '' }}> Yes
        </div>

        {{-- Parent Category --}}
        <div class="form-group {{ $category->is_parent == 1 ? 'd-none' : '' }}" id="parent_cat_div">
          <label for="parent_id">Parent Category</label>
          <select name="parent_id" class="form-control">
              <option value="">--Select Parent Category--</option>

              @foreach($parent_cats as $parent_cat)
                  <option value="{{ $parent_cat->id }}"
                      {{ $parent_cat->id == $category->parent_id ? 'selected' : '' }}>
                      {{ $parent_cat->title }}
                  </option>
              @endforeach

          </select>
        </div>

        {{-- Photo --}}
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo</label>

          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" 
                     class="btn azzahra-btn text-white">
                     <i class="fa fa-picture-o"></i> Choose Image
                  </a>
              </span>

              <input id="thumbnail" class="form-control" type="text"
                     name="photo" value="{{ $category->photo }}">
          </div>

          {{-- Image Preview --}}
          <div id="holder" style="margin-top:15px; max-height: 130px;">
            @if($category->photo)
                <img src="{{ $category->photo }}" style="height: 120px; border-radius: 10px;">
            @endif
          </div>

          @error('photo')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        {{-- Status --}}
        <div class="form-group">
          <label for="status">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active"   {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
          @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Submit --}}
        <div class="form-group mb-3">
           <button class="btn azzahra-btn" type="submit">Update Category</button>
        </div>

      </form>
    </div>
</div>

@endsection


@push('styles')
<link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
@endpush

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>

<script>
    // Init LFM
    $('#lfm').filemanager('image');

    // Summernote
    $('#summary').summernote({
        placeholder: "Write short description…..",
        tabsize: 2,
        height: 150
    });

    // Show/Hide Parent Category
    $('#is_parent').change(function(){
        if ($(this).prop('checked')) {
            $('#parent_cat_div').addClass('d-none');
        } else {
            $('#parent_cat_div').removeClass('d-none');
        }
    });
</script>
@endpush
