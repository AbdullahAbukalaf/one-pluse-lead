@extends('admin.layout.master')
@section('title','Edit Service')
@section('content')
<div class="card-box pd-20">
    <h4 class="mb-3">Edit Service</h4>
    @include('admin.Home.services._form', ['item'=>$item])
</div>
@endsection
