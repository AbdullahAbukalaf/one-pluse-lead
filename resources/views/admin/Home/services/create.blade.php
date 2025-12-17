@extends('admin.layout.master')
@section('title','Create Service')
@section('content')
<div class="card-box pd-20">
    <h4 class="mb-3">Create Service</h4>
    @include('admin.Home.services._form')
</div>
@endsection
