@extends('admin.layout.master')
@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit User</h4>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    @if($hasRole)
                        <div class="col-md-6">
                            <label class="form-label">Role (optional)</label>
                            <input type="text" name="role" class="form-control" value="{{ old('role', $user->role ?? '') }}">
                            @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    @endif

                    {{-- <div class="col-md-6">
                        <label class="form-label">Email Verified At</label>
                        <input type="datetime-local" name="email_verified_at" class="form-control"
                            value="{{ old('email_verified_at', optional($user->email_verified_at)->format('Y-m-d\\TH:i')) }}">
                        @error('email_verified_at') <small class="text-danger">{{ $message }}</small> @enderror
                        <div class="form-text">Leave blank to clear verification.</div>
                    </div> --}}

                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="new-password">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        <div class="form-text">Leave blank to keep the current password.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
