{{-- resources/views/admin/Home/purchase_banners/create.blade.php --}}
@extends('admin.layout.master')
@section('title','Create Purchase Banner')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Create Purchase Banner</h4>

    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.purchase-banners.store') }}">
            @csrf
            @include('admin.Home.purchase_banners._form')
        </form>
    </div></div>
</div>
@endsection
