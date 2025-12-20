@extends('admin.layout.master')
@section('title','Add Market Service')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Market Service</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.markets.services.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.markets.services.partials.form', ['item' => null])
            </form>
        </div>
    </div>
</div>
@endsection
