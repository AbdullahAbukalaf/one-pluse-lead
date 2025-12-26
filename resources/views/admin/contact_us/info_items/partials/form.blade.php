@php
    $isEdit = !is_null($item);
@endphp

<div class="row g-3">
    <div class="col-md-3">
        <label class="form-label">Group</label>
        <select name="group" class="form-control">
            @foreach(['address','hours','phone','email'] as $g)
                <option value="{{ $g }}" {{ old('group', $item->group ?? '') === $g ? 'selected' : '' }}>
                    {{ strtoupper($g) }}
                </option>
            @endforeach
        </select>
        @error('group')<div class="text-danger">{{ $message }}</div>@enderror
        <small class="text-muted d-block mt-1">
            address/hours use EN+AR values. phone/email uses Value only.
        </small>
    </div>

    <div class="col-md-2">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" min="1"
               value="{{ old('sort_order', $item->sort_order ?? 1) }}">
        @error('sort_order')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-2">
        <label class="form-label">Active</label>
        <select name="is_active" class="form-control">
            <option value="1" {{ old('is_active', $item->is_active ?? 1) ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !old('is_active', $item->is_active ?? 1) ? 'selected' : '' }}>No</option>
        </select>
        @error('is_active')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="col-12"><hr></div>

    <div class="col-md-6">
        <label class="form-label">Label EN (hours only)</label>
        <input type="text" name="label_en" class="form-control"
               value="{{ old('label_en', $item->label_en ?? '') }}">
        @error('label_en')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Label AR (hours only)</label>
        <input type="text" name="label_ar" class="form-control"
               value="{{ old('label_ar', $item->label_ar ?? '') }}">
        @error('label_ar')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Value EN (address/hours)</label>
        <textarea name="value_en" class="form-control" rows="2">{{ old('value_en', $item->value_en ?? '') }}</textarea>
        @error('value_en')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Value AR (address/hours)</label>
        <textarea name="value_ar" class="form-control" rows="2">{{ old('value_ar', $item->value_ar ?? '') }}</textarea>
        @error('value_ar')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label class="form-label">Value (phone/email)</label>
        <input type="text" name="value" class="form-control"
               value="{{ old('value', $item->value ?? '') }}">
        @error('value')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
</div>
