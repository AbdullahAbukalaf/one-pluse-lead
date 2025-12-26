@extends('admin.layout.master')
@section('title', 'Edit Location')

@section('content')
    <div class="container-fluid">
        <h4 class="mb-3">Edit Location</h4>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.where-to-find-us.locations.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Country EN</label>
                            <input type="text" name="country_en" class="form-control"
                                value="{{ old('country_en', $item->country_en ?? '') }}">
                            @error('country_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country AR</label>
                            <input type="text" name="country_ar" class="form-control"
                                value="{{ old('country_ar', $item->country_ar ?? '') }}">
                            @error('country_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">City EN</label>
                            <input type="text" name="city_en" class="form-control"
                                value="{{ old('city_en', $item->city_en ?? '') }}">
                            @error('city_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City AR</label>
                            <input type="text" name="city_ar" class="form-control"
                                value="{{ old('city_ar', $item->city_ar ?? '') }}">
                            @error('city_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">District EN</label>
                            <input type="text" name="district_en" class="form-control"
                                value="{{ old('district_en', $item->district_en ?? '') }}">
                            @error('district_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">District AR</label>
                            <input type="text" name="district_ar" class="form-control"
                                value="{{ old('district_ar', $item->district_ar ?? '') }}">
                            @error('district_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Address EN</label>
                            <textarea name="address_en" class="form-control" rows="4">{{ old('address_en', $item->address_en ?? '') }}</textarea>
                            @error('address_en')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address AR</label>
                            <textarea name="address_ar" class="form-control" rows="4">{{ old('address_ar', $item->address_ar ?? '') }}</textarea>
                            @error('address_ar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Latitude</label>
                            <input type="text" name="latitude" class="form-control"
                                value="{{ old('latitude', $item->latitude ?? '') }}">
                            @error('latitude')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Longitude</label>
                            <input type="text" name="longitude" class="form-control"
                                value="{{ old('longitude', $item->longitude ?? '') }}">
                            @error('longitude')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $item->phone ?? '') }}">
                            @error('phone')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control"
                                value="{{ old('email', $item->email ?? '') }}">
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Map Embed URL</label>
                            <textarea name="map_embed_url" class="form-control" rows="3">{{ old('map_embed_url', $item->map_embed_url ?? '') }}</textarea>
                            @error('map_embed_url')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.where-to-find-us.locations.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
