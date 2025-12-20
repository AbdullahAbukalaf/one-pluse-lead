@extends('admin.layout.master')
@section('title','Market Intro')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Market Intro</h4>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.markets.intro.update') }}">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Head Title EN</label>
                        <input type="text" name="head_title_en" class="form-control" value="{{ old('head_title_en', $item->head_title_en ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Head Title AR</label>
                        <input type="text" name="head_title_ar" class="form-control" value="{{ old('head_title_ar', $item->head_title_ar ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Title EN</label>
                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $item->title_en ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Title AR</label>
                        <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $item->title_ar ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Description EN</label>
                        <textarea name="description_en" class="form-control" rows="5">{{ old('description_en', $item->description_en ?? '') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Description AR</label>
                        <textarea name="description_ar" class="form-control" rows="5">{{ old('description_ar', $item->description_ar ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 d-flex align-items-center">
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                @checked(old('is_active', $item->is_active ?? true))>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
