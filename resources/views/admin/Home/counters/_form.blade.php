@php($isEdit = isset($item))

<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Value *</label>
        <input type="text" name="value" class="form-control" value="{{ old('value', $item->value ?? '') }}" required>
    </div>

    <div class="col-md-2">
        <label class="form-label">Suffix</label>
        <input type="text" name="suffix" class="form-control" value="{{ old('suffix', $item->suffix ?? '') }}">
    </div>

    <div class="col-md-3">
        <label class="form-label">Display Order</label>
        <input type="number" name="display_order" class="form-control" value="{{ old('display_order', $item->display_order ?? 0) }}">
    </div>

    <div class="col-md-3 d-flex align-items-end">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                   {{ old('is_active', $item->is_active ?? false) ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>
    </div>

    <div class="col-md-6">
        <label class="form-label">Description (EN)</label>
        <input type="text" name="description_en" class="form-control" value="{{ old('description_en', $item->description_en ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Description (AR)</label>
        <input type="text" name="description_ar" class="form-control" value="{{ old('description_ar', $item->description_ar ?? '') }}">
    </div>
</div>

<div class="mt-3">
    <button class="btn btn-primary">{{ $isEdit ? 'Update' : 'Create' }}</button>
    <a href="{{ route('admin.counters.index') }}" class="btn btn-light">Cancel</a>
</div>
