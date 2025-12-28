@extends('admin.layout.master')

@section('title', 'Add Product Images')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Images - {{ $product->title_en }}</h4>

    <form action="{{ route('admin.products.images.store', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Images</label>
            <input type="file"
                   name="images[]"
                   class="form-control"
                   multiple
                   required>
            <small class="text-muted">
                Allowed: jpg, jpeg, png, webp, svg (max 5MB each)
            </small>
        </div>

        <button class="btn btn-primary mt-3">
            Upload
        </button>
    </form>
</div>
@endsection
