@extends('backend.layouts.master')

@section('title','Azzahra Make Up || Tambah Banner')

@section('main-content')

<style>
    .card-custom {
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 18px rgba(201, 123, 132, 0.15);
    }

    .card-header-custom {
        background: #C97B84;
        color: #fff;
        font-weight: 600;
        border-radius: 15px 15px 0 0;
        padding: 18px;
    }

    label {
        font-weight: 600;
        color: #C97B84;
    }

    .btn-azzahra {
        background: #C97B84;
        color: white;
        border-radius: 30px;
        padding-left: 25px;
        padding-right: 25px;
    }

    .btn-azzahra:hover {
        background: #a25c63;
        color: white;
    }

    .btn-warning {
        border-radius: 30px;
    }

    .input-group .btn-primary {
        background: #C97B84;
        border: none;
    }

    .input-group .btn-primary:hover {
        background: #a25c63;
    }
</style>

<div class="card card-custom">
    <h5 class="card-header card-header-custom">Tambah Banner</h5>

    <div class="card-body">

        <form method="POST" action="{{ route('banner.store') }}">
            @csrf

            {{-- Title --}}
            <div class="form-group">
                <label for="inputTitle">Judul <span class="text-danger">*</span></label>
                <input id="inputTitle" type="text" name="title" class="form-control"
                       placeholder="Masukkan judul banner..."
                       value="{{ old('title') }}">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group">
                <label for="description">Deskripsi Banner</label>
                <textarea id="description" name="description" class="form-control summernote">
                    {{ old('description') }}
                </textarea>

                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Photo --}}
            <div class="form-group">
                <label for="inputPhoto">Foto Banner <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                           class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Pilih Foto
                        </a>
                    </span>

                    <input id="thumbnail" class="form-control" type="text" name="photo"
                           placeholder="URL gambar" value="{{ old('photo') }}">
                </div>

                <div id="holder" style="margin-top:15px; max-height:100px;"></div>

                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status">Status Banner <span class="text-danger">*</span></label>
                <select name="status" class="form-control">
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                </select>

                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="form-group mt-4">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-azzahra">Simpan Banner</button>
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
    $('#lfm').filemanager('image');

    $(document).ready(function() {
        $('#description').summernote({
            placeholder: 'Tulis deskripsi singkat banner...',
            height: 150
        });
    });
</script>
@endpush
