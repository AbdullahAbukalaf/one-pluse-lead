\
@extends('admin.layout.master')
@section('title','Create Certification')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Create Certification</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.technology.certifications.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Image (jpg/png/webp)</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label d-block">Active</label>
                        <input type="hidden" name="is_active" value="0">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label">Is Active</label>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Save</button>
                    <a class="btn btn-light" href="{{ route('admin.technology.certifications.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
