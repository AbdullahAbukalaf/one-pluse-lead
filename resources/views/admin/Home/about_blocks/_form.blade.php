@php($isEdit = isset($item))

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Outline EN</label>
        <input type="text" name="outline_en" class="form-control" value="{{ old('outline_en', $item->outline_en ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Outline AR</label>
        <input type="text" name="outline_ar" class="form-control" value="{{ old('outline_ar', $item->outline_ar ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Title EN</label>
        <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $item->title_en ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Title AR</label>
        <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $item->title_ar ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Description EN</label>
        <textarea name="description_en" rows="4" class="form-control">{{ old('description_en', $item->description_en ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Description AR</label>
        <textarea name="description_ar" rows="4" class="form-control">{{ old('description_ar', $item->description_ar ?? '') }}</textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label">Button Text EN</label>
        <input type="text" name="button_text_en" class="form-control" value="{{ old('button_text_en', $item->button_text_en ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Button Text AR</label>
        <input type="text" name="button_text_ar" class="form-control" value="{{ old('button_text_ar', $item->button_text_ar ?? '') }}">
    </div>

    <div class="col-md-8">
        <label class="form-label">Button URL</label>
        <input type="text" name="button_url" class="form-control" value="{{ old('button_url', $item->button_url ?? '') }}">
    </div>

    <div class="col-md-2">
        <label class="form-label">Display Order</label>
        <input type="number" name="display_order" class="form-control" value="{{ old('display_order', $item->display_order ?? 0) }}">
    </div>

    <div class="col-md-2 d-flex align-items-end">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                   {{ old('is_active', $item->is_active ?? false) ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>
    </div>

    <div class="col-md-6">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        @if(!empty($item->image_path))
            <div class="mt-2">
                <small class="text-muted d-block">Current:</small>
                <img src="{{ asset('storage/'.$item->image_path) }}" style="max-height:120px" class="img-thumbnail">
            </div>
        @endif
    </div>
</div>

<div class="mt-3">
    <button class="btn btn-primary">{{ $isEdit ? 'Update' : 'Create' }}</button>
    <a href="{{ route('admin.about-blocks.index') }}" class="btn btn-light">Cancel</a>
</div>
