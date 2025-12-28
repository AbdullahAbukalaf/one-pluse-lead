@extends('admin.layout.master')
@section('title', 'View User')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">User Details</h4>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $user->name }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                @if($hasRole)
                    <dt class="col-sm-3">Role</dt>
                    <dd class="col-sm-9">{{ $user->role ?? '—' }}</dd>
                @endif

                {{-- <dt class="col-sm-3">Email Verified At</dt>
                <dd class="col-sm-9">
                    {{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d H:i') : 'Not verified' }}
                </dd> --}}

                <dt class="col-sm-3">Created At</dt>
                <dd class="col-sm-9">{{ optional($user->created_at)->format('Y-m-d H:i') }}</dd>

                <dt class="col-sm-3">Updated At</dt>
                <dd class="col-sm-9">{{ optional($user->updated_at)->format('Y-m-d H:i') }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection
