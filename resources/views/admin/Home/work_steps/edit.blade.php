{{-- resources/views/admin/Home/work_steps/edit.blade.php --}}
@extends('admin.layout.master')
@section('title','Edit Work Step')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Work Step</h4>

    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.work-steps.update',$item) }}">
            @csrf @method('PUT')
            @include('admin.Home.work_steps._form')
        </form>
    </div></div>
</div>
@endsection
