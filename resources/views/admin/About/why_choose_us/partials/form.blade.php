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

    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $item?->is_active) ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>
    </div>
</div>
