@extends('admin.layout.master')
@section('title','Contact Us - Form Section')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Contact Us - Form Section</h4>

    @include('admin.contact_us._partials.nav')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{ $error }</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.contact-form-section.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


<div class="mb-3">
  <label class="form-label">Outline Title EN</label>
  <input type="text" name="outline_title_en" class="form-control" value="{{ old('outline_title_en', $item->outline_title_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Outline Title AR</label>
  <input type="text" name="outline_title_ar" class="form-control" value="{{ old('outline_title_ar', $item->outline_title_ar ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Title EN</label>
  <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $item->title_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Title AR</label>
  <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $item->title_ar ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Description EN</label>
  <textarea name="description_en" class="form-control" rows="4">{{ old('description_en', $item->description_en ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Description AR</label>
  <textarea name="description_ar" class="form-control" rows="4">{{ old('description_ar', $item->description_ar ?? '') }}</textarea>
</div>


                <div class="mb-3">
                    <label class="form-label">Active</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ old('is_active', $item->is_active ?? 1) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_active', $item->is_active ?? 1) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
