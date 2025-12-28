@extends('admin.layout.master')
@section('title','Products - Our Recent Works')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Our Recent Works</h4>
        <a href="{{ route('admin.products.recent_works.create') }}" class="btn btn-primary">Create</a>
    </div>


    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead><tr><th>ID</th><th>Title EN</th><th>Active</th><th>Sort</th><th class="text-end">Actions</th></tr></thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title_en }}</td>
                        <td><span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $item->is_active ? 'Yes' : 'No' }}</span></td>
                        <td>{{ $item->sort_order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.products.recent_works.edit', ['products_recent_work' => $item->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.products.recent_works.destroy', ['products_recent_work' => $item->id]) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this item?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
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
