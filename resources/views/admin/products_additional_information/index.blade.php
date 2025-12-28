@extends('admin.layout.master')
@section('title','Additional Information')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Additional Information - {{ $product->title_en }}</h4>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-light btn-sm">Back to Product</a>
            <a href="{{ route('admin.products.additional_information.create', $product->id) }}" class="btn btn-primary btn-sm">Add Row</a>
        </div>
    </div>


    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Label EN</th>
                        <th>Label AR</th>
                        <th>Value EN</th>
                        <th>Value AR</th>
                        <th>Sort</th>
                        <th>Active</th>
                        <th class="text-end" style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->label_en }}</td>
                            <td>{{ $item->label_ar }}</td>
                            <td>{{ $item->value_en }}</td>
                            <td>{{ $item->value_ar }}</td>
                            <td>{{ $item->sort_order }}</td>
                            <td>
                                <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->is_active ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.products.additional_information.edit', [$product->id, $item->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('admin.products.additional_information.destroy', [$product->id, $item->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this row?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No additional information yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection
