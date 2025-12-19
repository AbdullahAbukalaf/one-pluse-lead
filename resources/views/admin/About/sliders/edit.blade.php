@extends('admin.layout.master')
@section('title','Edit Slider Item')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Slider Item</h4>



    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.about.sliders.update', $item) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.About.sliders.partials.form', ['item' => $item])

                <button class="btn btn-primary mt-3">Save</button>
                <a href="{{ route('admin.about.sliders.index') }}" class="btn btn-light mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
