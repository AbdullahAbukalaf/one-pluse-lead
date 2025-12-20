@extends('admin.layout.master')
@section('title','Add Insight Category')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Insight Category</h4>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                @include('admin.categories.partials.form', ['item' => null])
            </form>
        </div>
    </div>
</div>
@endsection
