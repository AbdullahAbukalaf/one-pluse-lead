@extends('admin.layout.master')
@section('title','Add Contact Info Item')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add Contact Info Item</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.contact_us.info_items.store') }}">
                @csrf

                @include('admin.contact_us.info_items.partials.form', ['item' => null])

                <button class="btn btn-primary">Create</button>
                <a href="{{ route('admin.contact_us.info_items.index') }}" class="btn btn-outline-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
