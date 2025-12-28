@extends('admin.layout.master')
@section('title','Add Additional Info')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Additional Info - {{ $product->title_en }}</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.additional_information.store', $product->id) }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Label EN</label>
                        <input type="text" name="label_en" class="form-control" value="{{ old('label_en') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Label AR</label>
                        <input type="text" name="label_ar" class="form-control" value="{{ old('label_ar') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Value EN</label>
                        <input type="text" name="value_en" class="form-control" value="{{ old('value_en') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Value AR</label>
                        <input type="text" name="value_ar" class="form-control" value="{{ old('value_ar') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.products.additional_information.index', $product->id) }}" class="btn btn-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
