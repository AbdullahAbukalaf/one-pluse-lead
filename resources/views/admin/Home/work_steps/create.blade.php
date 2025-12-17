{{-- resources/views/admin/Home/work_steps/create.blade.php --}}
@extends('admin.layout.master')
@section('title','Create Work Step')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Create Work Step</h4>

    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.work-steps.store') }}">
            @csrf
            @include('admin.Home.work_steps._form')
        </form>
    </div></div>
</div>
@endsection
