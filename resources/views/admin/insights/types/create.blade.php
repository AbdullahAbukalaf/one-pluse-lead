@extends('admin.layout.master')
@section('title','Add Insight Type')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Insight Type</h4>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.insights.types.store') }}">
                @csrf
                @include('admin.insights.partials.text_fields', ['item' => null])
            </form>
        </div>
    </div>
</div>
@endsection
