@extends('admin.layout.master')
@section('title','Contact Info Section')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Contact Info Section</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.contact-info.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Map Embed URL</label>
                    <input type="text" name="map_embed_url" class="form-control"
                           value="{{ old('map_embed_url', $item->map_embed_url) }}">
                    @error('map_embed_url')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Active</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ old('is_active', $item->is_active) ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !old('is_active', $item->is_active) ? 'selected' : '' }}>No</option>
                    </select>
                    @error('is_active')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="{{ route('admin.contact_us.info_items.index') }}" class="btn btn-outline-secondary ms-2">
                    Manage Items (Addresses / Hours / Support)
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
