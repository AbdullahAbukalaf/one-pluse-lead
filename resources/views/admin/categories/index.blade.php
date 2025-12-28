@extends('admin.layout.master')
@section('title','Categories')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Categories</h4>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Add Category</a>
    </div>


    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title EN</th>
                        <th>Title AR</th>
                        <th>Slug</th>
                        <th>Banner Title EN</th>
                        <th>Banner Image</th>
                        <th>Order</th>
                        <th>Active</th>
                        <th style="width:200px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title_en }}</td>
                            <td>{{ $item->title_ar }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->banner_title_en }}</td>
                            <td>
                                @if($item->banner_image)
                                    <img src="{{ Storage::url($item->banner_image) }}" alt="" style="height:40px;object-fit:cover">
                                @endif
                            </td>
                            <td>{{ $item->sort_order }}</td>
                            <td><span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $item->is_active ? 'Yes' : 'No' }}</span></td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.categories.edit', $item) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.categories.destroy', $item) }}" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">No categories.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
