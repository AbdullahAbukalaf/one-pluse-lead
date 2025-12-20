@extends('admin.layout.master')
@section('title','Recommendations')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Recommendations</h4>


    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th><th>Name</th><th>Email</th><th>Country</th><th>Bought Before</th><th>Created</th><th style="width:160px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->country }}</td>
                            <td><span class="badge {{ $item->bought_before ? 'bg-success' : 'bg-secondary' }}">{{ $item->bought_before ? 'Yes' : 'No' }}</span></td>
                            <td>{{ $item->created_at?->format('Y-m-d') }}</td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.insights.recommendations.show', $item) }}">View</a>
                                <form method="POST" action="{{ route('admin.insights.recommendations.destroy', $item) }}" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">No recommendations yet.</td></tr>
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
