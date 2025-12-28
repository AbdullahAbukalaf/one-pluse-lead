@extends('admin.layout.master')
@section('title','Products Banner')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Products Banner</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.banner.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title EN</label>
                <input class="form-control" name="title_en" value="{{ old('title_en', $item->title_en) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Title AR</label>
                <input class="form-control" name="title_ar" value="{{ old('title_ar', $item->title_ar) }}">
            </div>
            <div class="col-md-12">
                <label class="form-label">Description EN</label>
                <textarea class="form-control" rows="2"
                    name="description_en">{{ old('description_en', $item->description_en) }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Description AR</label>
                <textarea class="form-control" rows="2"
                    name="description_ar">{{ old('description_ar', $item->description_ar) }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Image (path)</label>
                <input class="form-control" type="file" name="image" value="{{ old('image', $item->image) }}">
            </div>
        </div>

        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
