{{-- resources/views/admin/Home/counters/create.blade.php --}}
@extends('admin.layout.master')
@section('title','Create Counter')
@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Create Counter</h4>
    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.counters.store') }}">
            @csrf
            @include('admin.Home.counters._form')
        </form>
    </div></div>
</div>
@endsection
