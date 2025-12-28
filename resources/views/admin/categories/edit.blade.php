@extends('admin.layout.master')
@section('title','Edit Category')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Category</h4>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.update', $item) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.categories.partials.form', ['item' => $item])
            </form>
        </div>
    </div>
</div>
@endsection
