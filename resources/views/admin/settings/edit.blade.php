@extends('admin.layout.master')
@section('title', 'Settings')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Site Settings</h4>


    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Header Logo</label>
                        <input type="file" name="header_logo" class="form-control">
                        <small class="form-text text-muted">Recommended size: 192 × 35 pixels</small>
                        @if($item->header_logo_path)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$item->header_logo_path) }}" style="max-height:60px" alt="Header Logo">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Footer Logo</label>
                        <input type="file" name="footer_logo" class="form-control">
                        <small class="form-text text-muted">Recommended size: 192 × 35 pixels</small>
                        @if($item->footer_logo_path)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$item->footer_logo_path) }}" style="max-height:60px" alt="Footer Logo">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description EN</label>
                        <textarea name="description_en" class="form-control" rows="4">{{ old('description_en', $item->description_en) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description AR</label>
                        <textarea name="description_ar" class="form-control" rows="4">{{ old('description_ar', $item->description_ar) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $item->email) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $item->phone) }}">
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
