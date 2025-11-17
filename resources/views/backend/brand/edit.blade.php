@extends('backend.layouts.master')
@section('title','Azzahra Make Up || Brand Edit')
@section('main-content')

<style>
    /* 🌸 Soft Rose Theme */
    .card {
        border-radius: 16px !important;
        border: 1px solid #f3d4d7;
        box-shadow: 0 4px 12px rgba(201, 123, 132, 0.15);
    }

    .card-header {
        background: #C97B84 !important;
        color: white !important;
        font-weight: 600;
        font-size: 18px;
        border-radius: 16px 16px 0 0 !important;
        padding: 15px 20px;
    }

    label {
        font-weight: 600;
        color: #C97B84;
    }

    input.form-control, select.form-control {
        border-radius: 10px;
        border: 1px solid #e8bfc4;
        padding: 10px 12px;
    }

    input.form-control:focus, select.form-control:focus {
        border-color: #C97B84;
        box-shadow: 0 0 5px rgba(201,123,132,0.4);
    }

    /* 🌸 Button Style */
    .btn-rose {
        background-color: #C97B84;
        border-color: #C97B84;
        color: white;
        border-radius: 10px;
        padding: 8px 18px;
        font-weight: 600;
    }

    .btn-rose:hover {
        background-color: #b86c75;
        border-color: #b86c75;
    }

    /* Preview image */
    #holder img {
        border-radius: 10px;
        border: 1px solid #f3d4d7;
        padding: 4px;
    }
</style>

<div class="card">
    <h5 class="card-header">Edit Brand</h5>

    <div class="card-body">
      <form method="post" action="{{route('brand.update',$brand->id)}}">
        @csrf 
        @method('PATCH')

        {{-- Title --}}
        <div class="form-group">
          <label for="inputTitle">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                 value="{{$brand->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{-- Photo --}}
        <div class="form-group">
            <label for="thumbnail">Photo</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" 
                       class="btn btn-rose">
                        <i class="fa fa-picture-o"></i> Choose Image
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" 
                       name="photo" value="{{ $brand->photo }}">
            </div>

            {{-- Preview --}}
            <div id="holder" style="margin-top:15px; max-height:100px;">
                @if($brand->photo)
                    <img src="{{ $brand->photo }}" style="height:100px;">
                @endif
            </div>
        </div>

        {{-- Status --}}
        <div class="form-group">
          <label>Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active" {{ $brand->status=='active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ $brand->status=='inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{-- Submit --}}
        <div class="form-group mb-3">
           <button class="btn btn-rose" type="submit">Update</button>
        </div>

      </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush
