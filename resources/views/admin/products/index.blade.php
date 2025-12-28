@extends('admin.layout.master')
@section('title','Products')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Products</h4>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title EN</th>
                        <th>Slug</th>
                        <th>Active</th>
                        <th>Sort</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title_en }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $item->is_active ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td>{{ $item->sort_order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.products.edit', $item) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.products.destroy', $item) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete this product?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                            <a class="btn btn-sm btn-secondary" href="{{ route('admin.products.additional_information.index', $item->id) }}">
                                Additional Info
                            </a>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.products.images.index', $item->id) }}">
                                Gallery
                            </a>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection
