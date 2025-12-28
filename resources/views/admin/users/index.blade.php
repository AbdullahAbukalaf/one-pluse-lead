@extends('admin.layout.master')
@section('title', 'Users')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Users</h4>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Add User</a>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.users.index') }}" class="row g-2 align-items-end">
                <div class="col-md-6 col-lg-4">
                    <label class="form-label">Search (name or email)</label>
                    <input type="text" name="q" value="{{ $search }}" class="form-control"
                        placeholder="Search users...">
                </div>
                <div class="col-auto d-flex gap-2">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                    @if($search)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        @if($hasRole)
                            <th>Role</th>
                        @endif
                        {{-- <th>Verified</th> --}}
                        <th>Created</th>
                        <th class="text-end" style="width:220px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if($hasRole)
                                <td>{{ $user->role ?? '—' }}</td>
                            @endif
                            {{-- <td>
                                @if($user->email_verified_at)
                                    <span class="badge bg-success">Verified</span>
                                    <div class="small text-muted">{{ $user->email_verified_at->format('Y-m-d H:i') }}</div>
                                @else
                                    <span class="badge bg-secondary">Pending</span>
                                @endif
                            </td> --}}
                            <td>{{ optional($user->created_at)->format('Y-m-d') }}</td>
                            <td class="text-end d-flex gap-2 justify-content-end flex-wrap">
                                <a class="btn btn-sm btn-outline-secondary"
                                    href="{{ route('admin.users.show', $user) }}">View</a>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.users.edit', $user) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                    onsubmit="return confirm('Delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ $hasRole ? 7 : 6 }}" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
