@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-4 mt-4 ml-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <form method="post" action="/admin/category" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" required autofocus value="{{ old('name') }}" placeholder="Category Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label " for="image">Post Image</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/dashboard/categories" class="btn btn-danger">
                                    <span data-feather="arrow-left"></span> Back
                                </a>
                                <button type="submit" class="btn btn-primary"><span data-feather="save"></span> Save
                                    Post</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <div class="col-md-12 mt-4">
                    <div class="row"> 
                        <div class="col-md-4 mb-3">
                            <a href="/admin/product/create" class="btn btn-success">Add Product</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category Table</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Product Title</th>
                                        <th>Product Category</th>
                                        <th>Product Quatity</th>
                                        <th>Product Price</th>
                                        <th>Product Discount</th>
                                        <th>Image</th>
                                        <th style="width: 40px" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount_price }}</td>
                                            <td><img src="{{ asset('storage/' . $product->image) }}" height="10%" width="20%"></td>
                                            <td><a href="/admin/product/{{ $product->title }}" class="badge bg-success"><i class="nav-icon fas fa-eye"></i> Show</a></span>
                                            </td>
                                            <td><a href="/admin/product/{{ $product->title }}/edit" class="badge bg-warning text-light"><i class="nav-icon fas fa-pen text-light"></i> Edit</a></td>
                                            <td>
                                                <form action="/admin/product/{{ $product->title }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger border-0"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="nav-icon fas fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="justify-content-between pagination-sm">
                                {{ $products->links() }}
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
