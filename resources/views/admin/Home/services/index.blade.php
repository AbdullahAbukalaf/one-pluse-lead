@extends('admin.layout.master')
@section('title','Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Services</h3>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add Service</a>
</div>

<div class="card-box pd-20">
    <div class="table-responsive">
        <table class="table table-striped" id="dt-services">
            <thead>
            <tr>
                <th>#</th>
                <th>Title (EN)</th>
                <th>Title (AR)</th>
                <th>Active</th>
                <th>Order</th>
                <th>Updated</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->title_en }}</td>
                    <td>{{ $row->title_ar }}</td>
                    <td>
                        <span class="badge {{ $row->is_active ? 'badge-success' : 'badge-secondary' }}">
                            {{ $row->is_active ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td>{{ $row->display_order }}</td>
                    <td>{{ $row->updated_at->format('Y-m-d H:i') }}</td>
                    <td class="text-right">
                        <a href="{{ route('admin.services.edit',$row) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.services.destroy',$row) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this service?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-2">{{ $items->links() }}</div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#dt-services').DataTable({
        pageLength: 10,
        lengthChange: false,
        responsive: true
    });
</script>
@endpush
