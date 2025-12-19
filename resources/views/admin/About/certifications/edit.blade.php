@extends('admin.layout.master')
@section('title','Edit Certification')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Certification</h4>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.about.certifications.update', $item) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.About.certifications.partials.form', ['item' => $item])

                <button class="btn btn-primary mt-3">Save</button>
                <a href="{{ route('admin.about.certifications.index') }}" class="btn btn-light mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
