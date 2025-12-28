@extends('admin.layout.master')
@section('title','Where To Find Us - Hero')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Where To Find Us - Hero Section</h4>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.where-to-find-us.hero.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title EN</label>
                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $item->title_en) }}">
                        @error('title_en')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Title AR</label>
                        <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $item->title_ar) }}">
                        @error('title_ar')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description EN</label>
                        <textarea name="description_en" rows="5" class="form-control">{{ old('description_en', $item->description_en) }}</textarea>
                        @error('description_en')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description AR</label>
                        <textarea name="description_ar" rows="5" class="form-control">{{ old('description_ar', $item->description_ar) }}</textarea>
                        @error('description_ar')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Background Image</label>
                        <input type="file" name="background_image" class="form-control">
                        @error('background_image')<div class="text-danger small">{{ $message }}</div>@enderror
                        @if($item->background_image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$item->background_image) }}" alt="Background" style="max-height: 120px; border-radius: 8px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
