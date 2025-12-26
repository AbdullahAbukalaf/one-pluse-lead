@extends('admin.layout.master')
@section('title','Edit Contact Info Item')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Contact Info Item</h4>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.contact_us.info_items.update', $item->id) }}">
                @csrf
                @method('PUT')

                @include('admin.contact_us.info_items.partials.form', ['item' => $item])

                <button class="btn btn-primary">Save</button>
                <a href="{{ route('admin.contact_us.info_items.index') }}" class="btn btn-outline-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
