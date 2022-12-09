@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>
    <div class="content-wrapper">

    <div class="col-lg-8">
        <form method="post" action="/admin/category" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label " for="image">Post Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="/dashboard/categories" class="btn btn-danger">
                <span data-feather="arrow-left"></span> Back
            </a>
            <button type="submit" class="btn btn-primary"><span data-feather="save"></span> Save Post</button>
        </form>
        {{-- <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <form action="/admin/category" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Category Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label " for="image">Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div> --}}
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
