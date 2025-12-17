@extends('admin.layout.master')
@section('title','Edit Hero')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit Hero</h4>
        <a href="{{ route('admin.heroes.index') }}" class="btn btn-light">Back</a>
    </div>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.heroes.update',$item) }}" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title EN</label>
                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en',$item->title_en) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Title AR</label>
                        <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar',$item->title_ar) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description EN</label>
                        <textarea name="description_en" rows="4" class="form-control">{{ old('description_en',$item->description_en) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Description AR</label>
                        <textarea name="description_ar" rows="4" class="form-control">{{ old('description_ar',$item->description_ar) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Button Text EN</label>
                        <input type="text" name="button_text_en" class="form-control" value="{{ old('button_text_en',$item->button_text_en) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Button Text AR</label>
                        <input type="text" name="button_text_ar" class="form-control" value="{{ old('button_text_ar',$item->button_text_ar) }}">
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Button URL</label>
                        <input type="text" name="button_url" class="form-control" value="{{ old('button_url',$item->button_url) }}">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" value="{{ old('display_order',$item->display_order) }}">
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                   {{ old('is_active',$item->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Starts At</label>
                        <input type="date" name="starts_at" class="form-control"
                               value="{{ old('starts_at', optional($item->starts_at)->format('Y-m-d')) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ends At</label>
                        <input type="date" name="ends_at" class="form-control"
                               value="{{ old('ends_at', optional($item->ends_at)->format('Y-m-d')) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Video MP4</label>
                        <input type="file" name="video_mp4" class="form-control" accept="video/mp4">
                        @if($item->video_mp4_path)
                            <small class="text-muted">Current: {{ $item->video_mp4_path }}</small>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Video OGG</label>
                        <input type="file" name="video_ogg" class="form-control" accept="video/ogg,application/ogg">
                        @if($item->video_ogg_path)
                            <small class="text-muted">Current: {{ $item->video_ogg_path }}</small>
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.heroes.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
