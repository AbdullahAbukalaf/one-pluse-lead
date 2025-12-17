@extends('admin.layout.master')
@section('title','Create About Block')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Create About Block</h4>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.about-blocks.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.Home.about_blocks._form')
            </form>
        </div>
    </div>
</div>
@endsection
