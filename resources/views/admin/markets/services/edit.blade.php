@extends('admin.layout.master')
@section('title','Edit Market Service')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Market Service</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.markets.services.update', $item) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.markets.services.partials.form', ['item' => $item])
            </form>
        </div>
    </div>
</div>
@endsection
