<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Title EN</label>
        <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $item->title_en ?? '') }}">
        @error('title_en') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Title AR</label>
        <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $item->title_ar ?? '') }}">
        @error('title_ar') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Image (jpg/png/webp)</label>
        <input type="file" name="image" class="form-control">
        @error('image') <small class="text-danger">{{ $message }}</small> @enderror

        @if(!empty($item?->image))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $item->image) }}" alt="Service" style="max-width: 240px; border-radius: 8px;">
            </div>
        @endif
    </div>

    <div class="col-md-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $item->sort_order ?? 0) }}">
        @error('sort_order') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-3 d-flex align-items-center">
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                @checked(old('is_active', $item->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('admin.markets.services.index') }}" class="btn btn-light">Cancel</a>
    </div>
</div>
