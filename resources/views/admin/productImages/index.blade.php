@extends('admin.layout.master')

@section('title', 'Product Images')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">
        Product Images - {{ $product->title_en }}
    </h4>

    <a href="{{ route('admin.products.images.create', $product->id) }}"
       class="btn btn-primary mb-3">
        Add Images
    </a>

    {{-- Upload report --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('uploaded_images'))
        <div class="alert alert-success">
            <strong>Uploaded:</strong>
            {{ implode(', ', session('uploaded_images')) }}
        </div>
    @endif

    @if(session('failed_images') && count(session('failed_images')))
        <div class="alert alert-danger">
            <strong>Failed:</strong>
            {{ implode(', ', session('failed_images')) }}
        </div>
    @endif

    <div class="row">
        @foreach($items as $item)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$item->image_path) }}"
                         class="card-img-top"
                         style="height:180px;object-fit:cover">

                    <div class="card-body">
                        <span class="badge {{ $item->is_active ? 'badge-success' : 'badge-secondary' }}">
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>

                        <div class="mt-2">
                            <a href="{{ route('admin.products.images.edit', [$product->id, $item->id]) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.products.images.destroy', [$product->id, $item->id]) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete image?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $items->links() }}
</div>
@endsection
