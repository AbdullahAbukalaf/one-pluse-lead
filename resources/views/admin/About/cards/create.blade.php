@extends('admin.layout.master')
@section('title','Add Card')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Card</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.about.cards.store') }}">
                @csrf
                @include('admin.About.cards.partials.form', ['item' => null])

                <button class="btn btn-success mt-3">Create</button>
                <a href="{{ route('admin.about.cards.index') }}" class="btn btn-light mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
