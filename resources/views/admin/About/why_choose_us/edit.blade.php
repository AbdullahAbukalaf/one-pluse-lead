@extends('admin.layout.master')
@section('title','Edit Why Choose Us')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Why Choose Us</h4>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.about.why-choose-us.update', $item) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.About.why_choose_us.partials.form', ['item' => $item])

                <button class="btn btn-primary mt-3">Save</button>
                <a href="{{ route('admin.about.why-choose-us.index') }}" class="btn btn-light mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
