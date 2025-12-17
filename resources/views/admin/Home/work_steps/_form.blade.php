@php($isEdit = isset($item))

<div class="row g-3">
    <div class="col-md-2">
        <label class="form-label">Step Number *</label>
        <input type="number" name="step_number" class="form-control" value="{{ old('step_number', $item->step_number ?? 1) }}" required min="1">
    </div>

    <div class="col-md-5">
        <label class="form-label">Title EN *</label>
        <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $item->title_en ?? '') }}" required>
    </div>

    <div class="col-md-5">
        <label class="form-label">Title AR *</label>
        <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $item->title_ar ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Description EN</label>
        <textarea name="description_en" rows="4" class="form-control">{{ old('description_en', $item->description_en ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Description AR</label>
        <textarea name="description_ar" rows="4" class="form-control">{{ old('description_ar', $item->description_ar ?? '') }}</textarea>
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
</div>

<div class="mt-3">
    <button class="btn btn-primary">{{ $isEdit ? 'Update' : 'Create' }}</button>
    <a href="{{ route('admin.work-steps.index') }}" class="btn btn-light">Cancel</a>
</div>
