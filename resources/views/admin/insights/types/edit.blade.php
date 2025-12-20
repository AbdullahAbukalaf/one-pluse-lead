@extends('admin.layout.master')
@section('title','Edit Insight Type')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Insight Type</h4>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.insights.types.update', $item) }}">
                @csrf
                @method('PUT')
                @include('admin.insights.partials.text_fields', ['item' => $item])
            </form>
        </div>
    </div>
</div>
@endsection
