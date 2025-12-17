@extends('admin.layout.master')
@section('title','Work Steps')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Work Steps</h4>
        <a href="{{ route('admin.work-steps.create') }}" class="btn btn-primary">+ Add Step</a>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Step No</th>
                            <th>Title EN</th>
                            <th>Title AR</th>
                            <th>Order</th>
                            <th>Active</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->step_number }}</td>
                                <td>{{ $item->title_en }}</td>
                                <td>{{ $item->title_ar }}</td>
                                <td>{{ $item->display_order }}</td>
                                <td>
                                    <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->is_active ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.work-steps.edit',$item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form class="d-inline" method="POST" action="{{ route('admin.work-steps.destroy',$item) }}"
                                          onsubmit="return confirm('Delete this step?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center text-muted py-4">No steps found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection
