@extends('admin.layout.master')
@section('title','Why Choose Us')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">Why Choose Us</h4>
        <a href="{{ route('admin.about.why-choose-us.create') }}" class="btn btn-success">Add New</a>
    </div>


    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title (EN)</th>
                        <th>Active</th>
                        <th>Image</th>
                        <th>Created</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title_en }}</td>
                            <td>
                                <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->is_active ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>
                                @if($item->image)
                                    <a href="{{ asset('storage/'.$item->image) }}" target="_blank">View</a>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at?->format('Y-m-d') }}</td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.about.why-choose-us.edit', $item) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.about.why-choose-us.destroy', $item) }}"
                                      onsubmit="return confirm('Delete this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted">No items yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
