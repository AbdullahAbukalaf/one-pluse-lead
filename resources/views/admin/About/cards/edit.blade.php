@extends('admin.layout.master')
@section('title','Edit Card')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Card</h4>



    <div class="card">
        <div class="card-body">
            <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.about.cards.update', $item) }}">
                @csrf
                @method('PUT')

                @include('admin.About.cards.partials.form', ['item' => $item])

                <button class="btn btn-primary mt-3">Save</button>
                <a href="{{ route('admin.about.cards.index') }}" class="btn btn-light mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
