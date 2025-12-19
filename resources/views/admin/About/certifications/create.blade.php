@extends('admin.layout.master')
@section('title','Add Certification')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Certification</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.about.certifications.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.About.certifications.partials.form', ['item' => null])

                <button class="btn btn-success mt-3">Create</button>
                <a href="{{ route('admin.about.certifications.index') }}" class="btn btn-light mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
