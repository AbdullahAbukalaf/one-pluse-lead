@extends('admin.layout.master')
@section('title','Technology Testimonials')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="mb-0">Technology Testimonials</h4>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.technology.testimonials.create') }}">Create</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                            <th>Title EN</th>
                            <th>Title AR</th>
                            <th>Tag EN</th>
                            <th>Tag AR</th>
                        <th>Image</th>
                        <th>Active</th>
                        <th>Order</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title_en }}</td>
                            <td>{{ $item->title_ar }}</td>
                            <td>{{ $item->tag_en }}</td>
                            <td>{{ $item->tag_ar }}</td>
                            <td>
                                @if($item->image_path)
                                    <img src="{{ asset('storage/'.$item->image_path) }}" style="height:50px" alt="img">
                                @endif
                            </td>
                            <td>
                                @if($item->is_active)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>{{ $item->sort_order }}</td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.technology.testimonials.edit', $item) }}">Edit</a>
                                <form action="{{ route('admin.technology.testimonials.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="20" class="text-center">No items yet.</td></tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
