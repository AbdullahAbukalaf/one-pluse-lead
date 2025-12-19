@extends('admin.layout.master')
@section('title','About Cards')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">About Cards</h4>
        <a href="{{ route('admin.about.cards.create') }}" class="btn btn-success">Add New</a>
    </div>


    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title (EN)</th>
                        <th>Active</th>
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
                            <td>{{ $item->created_at?->format('Y-m-d') }}</td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.about.cards.edit', $item) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.about.cards.destroy', $item) }}" onsubmit="return confirm('Delete this card?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">No cards yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
