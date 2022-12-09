@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mt-4 ml-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <form method="post" action="/admin/product/{{ $product->title }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" required autofocus value="{{ old('title', $product->title) }}"
                                        placeholder="Title">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label " for="image">Product Image</label>
                                    <input type="hidden" name="oldImage" value="{{ $product->image }}">
                                    {{-- @if ($product->image)
                                      <img src="{{ asset('storage/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                      <img class="img-preview img-fluid mb-3 col-sm-5">    
                                    @endif --}}
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                      @enderror
                                  </div>

                                {{-- <div class="form-group">
                                    <label class="form-label " for="image">Image</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select form-control" name="category">
                                        @foreach ($category as $category)
                                            @if (old('category') == $category->name)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="category" class="form-label">category</label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror"
                                        id="category" name="category" required autofocus value="{{ old('category') }}" placeholder="category">
                                    @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label for="price" class="form-label">price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="price">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="quantity" class="form-label">quantity</label>
                                    <input type="number" min="0"
                                        class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                        name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="quantity">
                                    @error('quantity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="discount_price" class="form-label">discount_price</label>
                                    <input type="number" class="form-control @error('discount_price') is-invalid @enderror"
                                        id="discount_price" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}"
                                        placeholder="discount_price">
                                    @error('discount_price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">description</label>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input id="description" type="hidden" name="description" required
                                        value="{{ old('description', $product->description) }}">
                                    <trix-editor input="description"></trix-editor>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="/admin/product" class="btn btn-danger">
                                    <span data-feather="arrow-left"></span> Back
                                </a>
                                <button type="submit" class="btn btn-success "><span data-feather="save"></span> Save
                                    Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mr-4">
                    <div class="card shadow">
                        @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-preview img-fluid">
                      @else
                        <img class="img-preview img-fluid">    
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //  const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // title.addEventListener('change', function(){
        //     fetch('/admin/product/checkSlug?title=' + title.value)
        //     .then(response => response.json())
        //     .then(data => slug.value = data.slug)
        // });
        // document.addEventListener('trix-file-accept', function(e){
        //     e.preventDefault();
        // })

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
