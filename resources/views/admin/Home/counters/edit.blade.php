{{-- resources/views/admin/Home/counters/edit.blade.php --}}
@extends('admin.layout.master')
@section('title','Edit Counter')
@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Counter</h4>
    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.counters.update',$item) }}">
            @csrf @method('PUT')
            @include('admin.Home.counters._form')
        </form>
    </div></div>
</div>
@endsection
