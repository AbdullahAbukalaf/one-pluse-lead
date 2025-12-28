@extends('admin.layout.master')

@section('title', 'Edit Image')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Image</h4>

    <img src="{{ asset('storage/'.$image->image_path) }}"
         style="max-height:200px"
         class="mb-3">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.images.update', [$product->id, $image->id]) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Replace Image (optional)</label>
            <input type="file"
                   name="image"
                   class="form-control">
            <small class="text-muted">Allowed: jpg, jpeg, png, webp, svg (max 5MB)</small>
        </div>

        <div class="form-group">
            <label>Sort Order</label>
            <input type="number"
                   name="sort_order"
                   class="form-control"
                   value="{{ $image->sort_order }}">
        </div>

        <div class="form-check mt-2">
            <input type="checkbox"
                   name="is_active"
                   class="form-check-input"
                   value="1"
                   {{ $image->is_active ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button class="btn btn-primary mt-3">
            Save
        </button>
    </form>
</div>
@endsection
