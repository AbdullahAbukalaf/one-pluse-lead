@extends('admin.layout.master')
@section('title','Edit Recent Work')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Recent Work</h4>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif
    <form action="{{ route('admin.products.recent_works.update', ['products_recent_work' => $item]) }}" method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title EN</label>
                <input class="form-control" name="title_en" value="{{ old('title_en', $item->title_en ?? '') }}"
                    required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Title AR</label>
                <input class="form-control" name="title_ar" value="{{ old('title_ar', $item->title_ar ?? '') }}"
                    required>
            </div>
            <div class="col-md-12">
                <label class="form-label">Image (path)</label>
                <input class="form-control" type="file" name="image" value="{{ old('image', $item->image ?? '') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Sort Order</label>
                <input type="number" class="form-control" name="sort_order"
                    value="{{ old('sort_order', $item->sort_order ?? 0) }}">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active',
                        $item->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button class="btn btn-primary">Update</button>
            <a class="btn btn-light" href="{{ route('admin.products.recent_works.index') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
