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
        <label class="form-label">Slug (optional)</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $item->slug ?? '') }}">
        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Banner Title EN</label>
        <input type="text" name="banner_title_en" class="form-control" value="{{ old('banner_title_en', $item->banner_title_en ?? '') }}">
        @error('banner_title_en') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Banner Title AR</label>
        <input type="text" name="banner_title_ar" class="form-control" value="{{ old('banner_title_ar', $item->banner_title_ar ?? '') }}">
        @error('banner_title_ar') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Banner Description EN</label>
        <textarea name="banner_description_en" class="form-control" rows="2">{{ old('banner_description_en', $item->banner_description_en ?? '') }}</textarea>
        @error('banner_description_en') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Banner Description AR</label>
        <textarea name="banner_description_ar" class="form-control" rows="2">{{ old('banner_description_ar', $item->banner_description_ar ?? '') }}</textarea>
        @error('banner_description_ar') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Banner Image</label>
        <input type="file" name="banner_image" class="form-control">
        @error('banner_image') <small class="text-danger">{{ $message }}</small> @enderror
        @if(!empty($item?->banner_image))
            @php
                $bannerUrl = \Illuminate\Support\Facades\Storage::url($item->banner_image);
            @endphp
            <div class="mt-2">
                <img src="{{ $bannerUrl }}" alt="Current Banner" style="max-height:120px;">
                <div class="small text-muted">{{ $item->banner_image }}</div>
            </div>
        @endif
    </div>

    <div class="col-md-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $item->sort_order ?? 0) }}">
    </div>

    <div class="col-md-3 d-flex align-items-center">
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                @checked(old('is_active', $item->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>
</div>
<div class="mt-3">
    <button class="btn btn-primary">Save</button>
</div>
