@php($editing = isset($item))
<form method="POST" enctype="multipart/form-data"
      action="{{ $editing ? route('admin.services.update',$item) : route('admin.services.store') }}">
    @csrf
    @if($editing) @method('PUT') @endif

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" required
                   value="{{ old('slug', $item->slug ?? '') }}">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Display Order</label>
            <input type="number" name="display_order" class="form-control" min="0" max="65535"
                   value="{{ old('display_order', $item->display_order ?? 0) }}">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Title (EN)</label>
            <input type="text" name="title_en" class="form-control" required
                   value="{{ old('title_en', $item->title_en ?? '') }}">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Title (AR)</label>
            <input type="text" name="title_ar" class="form-control" required
                   value="{{ old('title_ar', $item->title_ar ?? '') }}">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Description (EN)</label>
            <textarea name="description_en" class="form-control" rows="4">{{ old('description_en', $item->description_en ?? '') }}</textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Description (AR)</label>
            <textarea name="description_ar" class="form-control" rows="4">{{ old('description_ar', $item->description_ar ?? '') }}</textarea>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Icon SVG (upload)</label>
            <input type="file" name="icon_svg" accept=".svg,image/svg+xml" class="form-control-file">
            @if($editing && $item->icon_svg_path)
                <div class="mt-2">
                    <small>Current:</small>
                    <img src="{{ asset('storage/'.$item->icon_svg_path) }}" alt="svg" style="height:40px">
                </div>
            @endif
        </div>

        <div class="col-md-3 mb-3 d-flex align-items-center">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1"
                       {{ old('is_active', ($item->is_active ?? true)) ? 'checked' : '' }}>
                <label class="custom-control-label" for="is_active">Active</label>
            </div>
        </div>
    </div>

    @error('slug')<div class="text-danger small">{{ $message }}</div>@enderror
    @error('title_en')<div class="text-danger small">{{ $message }}</div>@enderror
    @error('title_ar')<div class="text-danger small">{{ $message }}</div>@enderror

    <div class="mt-3">
        <button class="btn btn-primary">{{ $editing ? 'Update' : 'Create' }}</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</form>
