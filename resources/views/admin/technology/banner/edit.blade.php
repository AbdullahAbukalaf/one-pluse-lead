\
@extends('admin.layout.master')
@section('title','Technology Banner')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Technology Banner</h4>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.technology.banner.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title EN</label>
                        <input type="text" name="title_en" value="{{ old('title_en', $item->title_en) }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Title AR</label>
                        <input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar) }}" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description EN</label>
                        <textarea name="description_en" class="form-control" rows="4">{{ old('description_en', $item->description_en) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Description AR</label>
                        <textarea name="description_ar" class="form-control" rows="4">{{ old('description_ar', $item->description_ar) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Image (jpg/png/webp)</label>
                        <input type="file" name="image" class="form-control">
                        @if($item->image_path)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$item->image_path) }}" alt="banner" style="max-height:120px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-12">
                        <label class="form-label d-block">Active</label>
                        <input type="hidden" name="is_active" value="0">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label">Is Active</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
