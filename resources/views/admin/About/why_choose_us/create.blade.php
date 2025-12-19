@extends('admin.layout.master')
@section('title','Add Why Choose Us')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Why Choose Us</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.about.why-choose-us.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.About.why_choose_us.partials.form', ['item' => null])
                <button class="btn btn-success mt-3">Create</button>
                <a href="{{ route('admin.about.why-choose-us.index') }}" class="btn btn-light mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
