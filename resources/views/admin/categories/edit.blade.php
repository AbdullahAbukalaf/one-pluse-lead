@extends('admin.layout.master')
@section('title','Edit Insight Category')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Insight Category</h4>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.update', $item) }}">
                @csrf
                @method('PUT')
                @include('admin.categories.partials.form', ['item' => $item])
            </form>
        </div>
    </div>
</div>
@endsection
