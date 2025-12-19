<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Title (EN)</label>
        <input class="form-control" name="title_en" value="{{ old('title_en', $item?->title_en) }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Title (AR)</label>
        <input class="form-control" name="title_ar" value="{{ old('title_ar', $item?->title_ar) }}">
    </div>

    <div class="col-md-12">
        <label class="form-label">SVG (inline or path)</label>
        <input class="form-control" type="file" accept=".svg,image/svg" name="svg" value="{{ old('svg', $item?->svg) }}">
        <small class="text-muted">Paste inline SVG or store a path.</small>
    </div>

    <div class="col-md-6">
        <label class="form-label">Description (EN)</label>
        <textarea class="form-control" rows="4" name="description_en">{{ old('description_en', $item?->description_en) }}</textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label">Description (AR)</label>
        <textarea class="form-control" rows="4" name="description_ar">{{ old('description_ar', $item?->description_ar) }}</textarea>
    </div>

    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $item?->is_active) ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>
    </div>
</div>
