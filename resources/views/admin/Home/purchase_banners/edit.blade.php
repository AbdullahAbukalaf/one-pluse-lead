{{-- resources/views/admin/Home/purchase_banners/edit.blade.php --}}
@extends('admin.layout.master')
@section('title','Edit Purchase Banner')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Purchase Banner</h4>

    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.purchase-banners.update',$item) }}">
            @csrf @method('PUT')
            @include('admin.Home.purchase_banners._form')
        </form>
    </div></div>
</div>
@endsection
