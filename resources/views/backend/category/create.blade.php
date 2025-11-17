@extends('backend.layouts.master')

@section('main-content')

<style>
    /* ====== Azzahra Theme ====== */
    .azzahra-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid #f5d7db;
        box-shadow: 0 4px 10px rgba(201, 123, 132, 0.15);
        padding-bottom: 20px;
    }

    .azzahra-header {
        background: #C97B84;
        color: white;
        padding: 16px 20px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 14px 14px 0 0;
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

    .form-label {
        font-weight: 600;
        color: #C97B84;
    }

    #holder img {
        border-radius: 10px;
        border: 1px solid #e9c8ce;
        padding: 4px;
        height: 100px;
    }
</style>


<div class="azzahra-card shadow mb-4">

    <div class="azzahra-header">
        Add Category
    </div>

    <div class="card-body">
        <form method="post" action="{{route('category.store')}}">
            @csrf

            {{-- TITLE --}}
            <div class="form-group">
                <label for="inputTitle" class="form-label">Title <span class="text-danger">*</span></label>
                <input id="inputTitle" type="text" name="title" class="form-control"
                       placeholder="Enter category title" value="{{ old('title') }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- SUMMARY --}}
            <div class="form-group">
                <label for="summary" class="form-label">Summary</label>
                <textarea class="form-control" id="summary" name="summary">{{ old('summary') }}</textarea>
                @error('summary')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- IS PARENT --}}
            <div class="form-group">
                <label for="is_parent" class="form-label">Is Parent?</label><br>
                <input type="checkbox" name="is_parent" id="is_parent" value="1" checked>
                <span style="margin-left: 6px;">Yes</span>
            </div>

            {{-- PARENT CATEGORY --}}
            <div class="form-group d-none" id="parent_cat_div">
                <label for="parent_id" class="form-label">Parent Category</label>
                <select name="parent_id" class="form-control">
                    <option value="">-- Select any category --</option>
                    @foreach($parent_cats as $key => $parent_cat)
                        <option value="{{ $parent_cat->id }}">{{ $parent_cat->title }}</option>
                    @endforeach
                </select>
            </div>

            {{-- PHOTO --}}
            <div class="form-group">
                <label for="inputPhoto" class="form-label">Photo</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn azzahra-btn text-white">
                            <i class="fa fa-picture-o"></i> Choose Image
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ old('photo') }}">
                </div>
                <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- STATUS --}}
            <div class="form-group">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- BUTTONS --}}
            <div class="form-group mt-4">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button class="btn azzahra-btn" type="submit">Submit</button>
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

    $('#summary').summernote({
        placeholder: "Write short description...",
        tabsize: 2,
        height: 120
    });

    $('#is_parent').change(function(){
        if($(this).prop('checked')){
            $('#parent_cat_div').addClass('d-none');
        } else {
            $('#parent_cat_div').removeClass('d-none');
        }
    });
</script>
@endpush
