@extends('admin.layout.master')
@section('title','Contact Info Items')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4 class="mb-0">Contact Info Items</h4>
            <small class="text-muted">Addresses / Office Hours / Phones / Emails</small>
        </div>
        <div>
            <a href="{{ route('admin.contact-info.edit') }}" class="btn btn-outline-secondary">Edit Map/Active</a>
            <a href="{{ route('admin.contact_us.info_items.create') }}" class="btn btn-primary ms-2">Add Item</a>
        </div>
    </div>


    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2">
                <div class="col-md-3">
                    <select name="group" class="form-control" onchange="this.form.submit()">
                        <option value="">All Groups</option>
                        @foreach(['address','hours','phone','email'] as $g)
                            <option value="{{ $g }}" {{ request('group')===$g ? 'selected' : '' }}>
                                {{ strtoupper($g) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-9 text-end">
                    @if(request('group'))
                        <a class="btn btn-link" href="{{ route('admin.contact_us.info_items.index') }}">Clear Filter</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th style="width:120px;">Group</th>
                        <th>Label EN</th>
                        <th>Label AR</th>
                        <th>Value EN</th>
                        <th>Value AR</th>
                        <th>Value</th>
                        <th style="width:90px;">Sort</th>
                        <th style="width:90px;">Active</th>
                        <th style="width:170px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td><span class="badge bg-dark">{{ $item->group }}</span></td>
                            <td>{{ $item->label_en }}</td>
                            <td>{{ $item->label_ar }}</td>
                            <td style="min-width:220px;">{{ $item->value_en }}</td>
                            <td style="min-width:220px;">{{ $item->value_ar }}</td>
                            <td>{{ $item->value }}</td>
                            <td>{{ $item->sort_order }}</td>
                            <td>
                                <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->is_active ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.contact_us.info_items.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.contact_us.info_items.destroy', $item->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="9" class="text-center">No items</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection
