@extends('admin.layout.master')
@section('title','Contact Us - Explore Locator Section')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Contact Us - Explore Locator Section</h4>

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
            <form method="POST" action="{{ route('admin.contact-explore-locator.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


<div class="mb-3">
  <label class="form-label">Title EN</label>
  <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $item->title_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Title AR</label>
  <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $item->title_ar ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find an AGENT EN</label>
  <input type="text" name="find_agent_en" class="form-control" value="{{ old('find_agent_en', $item->find_agent_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find an AGENT AR</label>
  <input type="text" name="find_agent_ar" class="form-control" value="{{ old('find_agent_ar', $item->find_agent_ar ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find an AGENT Sub EN</label>
  <input type="text" name="find_agent_sub_en" class="form-control" value="{{ old('find_agent_sub_en', $item->find_agent_sub_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find an AGENT Sub AR</label>
  <input type="text" name="find_agent_sub_ar" class="form-control" value="{{ old('find_agent_sub_ar', $item->find_agent_sub_ar ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find a DISTRIBUTOR EN</label>
  <input type="text" name="find_distributor_en" class="form-control" value="{{ old('find_distributor_en', $item->find_distributor_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find a DISTRIBUTOR AR</label>
  <input type="text" name="find_distributor_ar" class="form-control" value="{{ old('find_distributor_ar', $item->find_distributor_ar ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find a DISTRIBUTOR Sub EN</label>
  <input type="text" name="find_distributor_sub_en" class="form-control" value="{{ old('find_distributor_sub_en', $item->find_distributor_sub_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find a DISTRIBUTOR Sub AR</label>
  <input type="text" name="find_distributor_sub_ar" class="form-control" value="{{ old('find_distributor_sub_ar', $item->find_distributor_sub_ar ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find a RETAILER EN</label>
  <input type="text" name="find_retailer_en" class="form-control" value="{{ old('find_retailer_en', $item->find_retailer_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find a RETAILER AR</label>
  <input type="text" name="find_retailer_ar" class="form-control" value="{{ old('find_retailer_ar', $item->find_retailer_ar ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find a RETAILER Sub EN</label>
  <input type="text" name="find_retailer_sub_en" class="form-control" value="{{ old('find_retailer_sub_en', $item->find_retailer_sub_en ?? '') }}" maxlength="255">
</div>

<div class="mb-3">
  <label class="form-label">Find a RETAILER Sub AR</label>
  <input type="text" name="find_retailer_sub_ar" class="form-control" value="{{ old('find_retailer_sub_ar', $item->find_retailer_sub_ar ?? '') }}" maxlength="255">
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
