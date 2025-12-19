@extends('admin.layout.master')
@section('title','About Section')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">About Section</h4>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.about.section.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title (EN)</label>
                        <input class="form-control" name="title_en" value="{{ old('title_en', $item?->title_en) }}">
                        @error('title_en') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Title (AR)</label>
                        <input class="form-control" name="title_ar" value="{{ old('title_ar', $item?->title_ar) }}">
                        @error('title_ar') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description (EN)</label>
                        <textarea class="form-control" rows="4" name="description_en">{{ old('description_en', $item?->description_en) }}</textarea>
                        @error('description_en') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description (AR)</label>
                        <textarea class="form-control" rows="4" name="description_ar">{{ old('description_ar', $item?->description_ar) }}</textarea>
                        @error('description_ar') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image</label>
                        <input class="form-control" type="file" name="image">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror

                        @if($item?->image)
                            <div class="mt-2">
                                <a class="btn btn-sm btn-outline-primary" href="{{ asset('storage/'.$item->image) }}" target="_blank">View Current</a>
                            </div>
                        @endif
                    </div>

                    <div class="col-12"><hr></div>

                    <div class="col-md-4">
                        <label class="form-label">Progress 1 Title (EN)</label>
                        <input class="form-control" name="progress_bar_title1_en" value="{{ old('progress_bar_title1_en', $item?->progress_bar_title1_en) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Progress 1 Title (AR)</label>
                        <input class="form-control" name="progress_bar_title1_ar" value="{{ old('progress_bar_title1_ar', $item?->progress_bar_title1_ar) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Progress 1 %</label>
                        <input class="form-control" type="number" min="0" max="100" name="progress_bar_percent1"
                               value="{{ old('progress_bar_percent1', $item?->progress_bar_percent1 ?? 0) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Progress 2 Title (EN)</label>
                        <input class="form-control" name="progress_bar_title2_en" value="{{ old('progress_bar_title2_en', $item?->progress_bar_title2_en) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Progress 2 Title (AR)</label>
                        <input class="form-control" name="progress_bar_title2_ar" value="{{ old('progress_bar_title2_ar', $item?->progress_bar_title2_ar) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Progress 2 %</label>
                        <input class="form-control" type="number" min="0" max="100" name="progress_bar_percent2"
                               value="{{ old('progress_bar_percent2', $item?->progress_bar_percent2 ?? 0) }}">
                    </div>

                    <div class="col-md-6 d-flex align-items-center">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $item?->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary mt-3">Save</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-light mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
