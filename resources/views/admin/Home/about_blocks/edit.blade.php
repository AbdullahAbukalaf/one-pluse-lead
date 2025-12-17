@extends('admin.layout.master')
@section('title','Edit About Block')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit About Block</h4>
        <a href="{{ route('admin.about-blocks.index') }}" class="btn btn-light">Back</a>
    </div>


    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.about-blocks.update',$item) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('admin.Home.about_blocks._form')
            </form>
        </div>
    </div>

    {{-- FEATURES --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Features</strong>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.about-blocks.features.store', $item) }}" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Text EN *</label>
                        <input type="text" name="text_en" class="form-control" value="{{ old('text_en') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Text AR *</label>
                        <input type="text" name="text_ar" class="form-control" value="{{ old('text_ar') }}" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Order</label>
                        <input type="number" name="display_order" class="form-control" value="{{ old('display_order',0) }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Icon SVG</label>
                        <input type="file" name="icon_svg" class="form-control" accept=".svg,image/svg+xml">
                    </div>
                </div>
                <button class="btn btn-outline-primary mt-3">+ Add Feature</button>
            </form>

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Text EN</th>
                            <th>Text AR</th>
                            <th>Order</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($item->features as $f)
                            <tr>
                                <td>{{ $f->id }}</td>
                                <td style="width:80px">
                                    @if($f->icon_svg_path)
                                        <img src="{{ asset('storage/'.$f->icon_svg_path) }}" width="28" height="28" alt="icon">
                                    @endif
                                </td>
                                <td>{{ $f->text_en }}</td>
                                <td>{{ $f->text_ar }}</td>
                                <td>{{ $f->display_order }}</td>
                                <td class="text-end">
                                    <form method="POST" action="{{ route('admin.about-features.destroy', $f) }}"
                                          onsubmit="return confirm('Delete this feature?')" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted py-4">No features added yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
