@extends('admin.layout.master')
@section('title','Edit Product')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit Product</h4>
        <div class="btn-group">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.products.images.index', $item->id) }}">Gallery</a>
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.products.additional_information.index', $item->id) }}">Additional Info</a>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.update', $item) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title EN</label>
                <input class="form-control" name="title_en" value="{{ old('title_en', $item->title_en ?? '') }}"
                    required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Title AR</label>
                <input class="form-control" name="title_ar" value="{{ old('title_ar', $item->title_ar ?? '') }}"
                    required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Slug (optional)</label>
                <input class="form-control" name="slug" value="{{ old('slug', $item->slug ?? '') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Sort Order</label>
                <input type="number" class="form-control" name="sort_order"
                    value="{{ old('sort_order', $item->sort_order ?? 0) }}">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active',
                        $item->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label">Categories (multi-select)</label>
                <div class="row">
                    @foreach($categories as $cat)
                    <div class="col-md-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="category_ids[]" value="{{ $cat->id }}"
                                {{ in_array($cat->id, old('category_ids', isset($item) ?
                            $item->categories->pluck('id')->all() : [])) ? 'checked' : '' }}>
                            <span class="form-check-label">{{ $cat->title_en }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Brand EN</label>
                <input class="form-control" name="brand_en" value="{{ old('brand_en', $item->brand_en ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Brand AR</label>
                <input class="form-control" name="brand_ar" value="{{ old('brand_ar', $item->brand_ar ?? '') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Card Image (path)</label>
                <input class="form-control" type="file" name="card_image"
                    value="{{ old('card_image', $item->card_image ?? '') }}">
            </div>
            @if(!empty($item->image))
            <div class="mb-2">
                <img src="{{ asset('storage/'.$item->image) }}" style="max-height:120px;" alt="">
            </div>
            @endif

            <div class="col-md-6">
                <label class="form-label">Price (nullable)</label>
                <input class="form-control" name="price" value="{{ old('price', $item->price ?? '') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">SKU</label>
                <input class="form-control" name="sku" value="{{ old('sku', $item->sku ?? '') }}">
            </div>

            <div class="col-md-12">
                <label class="form-label">Short Description EN</label>
                <textarea class="form-control" rows="2"
                    name="short_description_en">{{ old('short_description_en', $item->short_description_en ?? '') }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Short Description AR</label>
                <textarea class="form-control" rows="2"
                    name="short_description_ar">{{ old('short_description_ar', $item->short_description_ar ?? '') }}</textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label">Description EN (Tab: Description)</label>
                <textarea class="form-control" rows="4"
                    name="description_en">{{ old('description_en', $item->description_en ?? '') }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Description AR (Tab: Description)</label>
                <textarea class="form-control" rows="4"
                    name="description_ar">{{ old('description_ar', $item->description_ar ?? '') }}</textarea>
            </div>

            <hr class="my-3">

            <div class="col-md-6">
                <label class="form-label">Spec 1 EN</label>
                <input class="form-control" name="spec_1_en" value="{{ old('spec_1_en', $item->spec_1_en ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Spec 1 AR</label>
                <input class="form-control" name="spec_1_ar" value="{{ old('spec_1_ar', $item->spec_1_ar ?? '') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Spec 2 EN</label>
                <input class="form-control" name="spec_2_en" value="{{ old('spec_2_en', $item->spec_2_en ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Spec 2 AR</label>
                <input class="form-control" name="spec_2_ar" value="{{ old('spec_2_ar', $item->spec_2_ar ?? '') }}">
            </div>

            <div class="col-md-12">
                <label class="form-label">Details Snippet EN</label>
                <textarea class="form-control" rows="2"
                    name="details_snippet_en">{{ old('details_snippet_en', $item->details_snippet_en ?? '') }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Details Snippet AR</label>
                <textarea class="form-control" rows="2"
                    name="details_snippet_ar">{{ old('details_snippet_ar', $item->details_snippet_ar ?? '') }}</textarea>
            </div>

            <hr class="my-3">

            <div class="col-md-6">
                <label class="form-label">Tags EN (comma or newline separated)</label>
                <textarea class="form-control" rows="2"
                    name="tags_en">{{ old('tags_en', isset($item) ? implode(', ', (array)$item->tags_en) : '') }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tags AR (comma or newline separated)</label>
                <textarea class="form-control" rows="2"
                    name="tags_ar">{{ old('tags_ar', isset($item) ? implode(', ', (array)$item->tags_ar) : '') }}</textarea>
            </div>

        </div>

        <div class="mt-3">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>
</div>
@endsection
