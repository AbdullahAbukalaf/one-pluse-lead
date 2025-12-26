@extends('admin.layout.master')
@section('title','Contact Us Submissions')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Contact Us - Form Submissions</h4>

    @include('admin.contact_us._partials.nav')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>IP</th>
                        <th>Created</th>
                        <th style="width:160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <span class="badge {{ $item->is_read ? 'bg-success' : 'bg-warning' }}">
                                    {{ $item->is_read ? 'Read' : 'Unread' }}
                                </span>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->subject }}</td>
                            <td style="max-width:380px;white-space:normal;">{{ $item->message }}</td>
                            <td>{{ $item->ip_address }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <form class="d-inline" method="POST" action="{{ route('admin.contact-submissions.mark-read', $item) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-outline-primary" {{ $item->is_read ? 'disabled' : '' }}>Mark Read</button>
                                </form>

                                <form class="d-inline" method="POST" action="{{ route('admin.contact-submissions.destroy', $item) }}" onsubmit="return confirm('Delete this submission?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="10" class="text-center">No submissions found.</td></tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">{{ $items->links() }}</div>
        </div>
    </div>
</div>
@endsection
