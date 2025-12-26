@extends('admin.layout.master')
@section('title','Edit Distributor')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Distributor</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.where-to-find-us.distributors.update', $item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Name --}}
                    <div class="col-md-6">
                        <label class="form-label">Name EN</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $item->name_en) }}">
                        @error('name_en')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Name AR</label>
                        <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $item->name_ar) }}">
                        @error('name_ar')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    {{-- Country --}}
                    <div class="col-md-6">
                        <label class="form-label">Country EN</label>
                        <input type="text" name="country_en" class="form-control" value="{{ old('country_en', $item->country_en) }}">
                        @error('country_en')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Country AR</label>
                        <input type="text" name="country_ar" class="form-control" value="{{ old('country_ar', $item->country_ar) }}">
                        @error('country_ar')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    {{-- City --}}
                    <div class="col-md-6">
                        <label class="form-label">City EN</label>
                        <input type="text" name="city_en" class="form-control" value="{{ old('city_en', $item->city_en) }}">
                        @error('city_en')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">City AR</label>
                        <input type="text" name="city_ar" class="form-control" value="{{ old('city_ar', $item->city_ar) }}">
                        @error('city_ar')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    {{-- District --}}
                    <div class="col-md-6">
                        <label class="form-label">District EN</label>
                        <input type="text" name="district_en" class="form-control" value="{{ old('district_en', $item->district_en) }}">
                        @error('district_en')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">District AR</label>
                        <input type="text" name="district_ar" class="form-control" value="{{ old('district_ar', $item->district_ar) }}">
                        @error('district_ar')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    {{-- Address --}}
                    <div class="col-md-6">
                        <label class="form-label">Address EN</label>
                        <textarea name="address_en" class="form-control" rows="3">{{ old('address_en', $item->address_en) }}</textarea>
                        @error('address_en')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address AR</label>
                        <textarea name="address_ar" class="form-control" rows="3">{{ old('address_ar', $item->address_ar) }}</textarea>
                        @error('address_ar')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    {{-- Map --}}
                    <div class="col-md-4">
                        <label class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $item->latitude) }}">
                        @error('latitude')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $item->longitude) }}">
                        @error('longitude')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Map Embed URL</label>
                        <input type="text" name="map_embed_url" class="form-control" value="{{ old('map_embed_url', $item->map_embed_url) }}">
                        @error('map_embed_url')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    {{-- Contact --}}
                    <div class="col-md-4">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $item->phone) }}">
                        @error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email', $item->email) }}">
                        @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" class="form-control" value="{{ old('website', $item->website) }}">
                        @error('website')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    {{-- Logo --}}
                    <div class="col-md-8">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control">
                        @error('logo')<div class="text-danger small">{{ $message }}</div>@enderror

                        @if($item->logo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$item->logo) }}" alt="Logo" style="max-height: 70px; border-radius: 8px;">
                            </div>
                        @endif
                    </div>

                    {{-- Active --}}
                    <div class="col-md-4 d-flex align-items-end">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>

                </div>

                <div class="mt-4">
                    <button class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.where-to-find-us.distributors.index') }}" class="btn btn-light">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
