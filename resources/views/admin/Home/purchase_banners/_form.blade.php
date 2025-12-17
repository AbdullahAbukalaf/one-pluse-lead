@php($isEdit = isset($item))

<div class="row g-3">
    <div class="col-md-3">
        <label class="form-label">Key</label>
        <input type="text" name="key" class="form-control" value="{{ old('key', $item->key ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Heading EN *</label>
        <input type="text" name="heading_en" class="form-control" value="{{ old('heading_en', $item->heading_en ?? '') }}" required>
    </div>

    <div class="col-md-5">
        <label class="form-label">Heading AR *</label>
        <input type="text" name="heading_ar" class="form-control" value="{{ old('heading_ar', $item->heading_ar ?? '') }}" required>
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
</div>

<div class="mt-3">
    <button class="btn btn-primary">{{ $isEdit ? 'Update' : 'Create' }}</button>
    <a href="{{ route('admin.purchase-banners.index') }}" class="btn btn-light">Cancel</a>
</div>
