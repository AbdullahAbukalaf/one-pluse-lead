@extends('admin.layout.master')
@section('title','Where To Find Us - Distributors')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="mb-0">Where To Find Us - Distributors</h4>
        <a href="{{ route('admin.where-to-find-us.distributors.create') }}" class="btn btn-primary">Add Distributor</a>
    </div>


    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Lat/Lng</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Logo</th>
                        <th>Active</th>
                        <th style="width: 160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name_en }}</td>
                            <td>{{ $item->country_en }}</td>
                            <td>{{ $item->city_en ?? '-' }}</td>
                            <td>
                                @if($item->latitude && $item->longitude)
                                    {{ $item->latitude }}, {{ $item->longitude }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->phone ?? '-' }}</td>
                            <td>{{ $item->email ?? '-' }}</td>
                            <td>
                                @if($item->website)
                                    <a href="{{ $item->website }}" target="_blank" rel="noopener">Open</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($item->logo)
                                    <img src="{{ asset('storage/'.$item->logo) }}" alt="Logo" style="height: 34px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->is_active ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.where-to-find-us.distributors.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.where-to-find-us.distributors.destroy', $item->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this distributor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="11" class="text-center text-muted">No records</td></tr>
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
