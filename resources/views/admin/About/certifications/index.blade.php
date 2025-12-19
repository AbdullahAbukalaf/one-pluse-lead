@extends('admin.layout.master')
@section('title','Certifications')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">Certifications</h4>
        <a href="{{ route('admin.about.certifications.create') }}" class="btn btn-success">Add New</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                @forelse($items as $item)
                    <div class="col-md-3">
                        <div class="border rounded p-2">


                            <a href="{{ $item->image ? asset('storage/'.$item->image) : '#' }}" target="_blank">
                                @if($item->image)
                                    <img src="{{ asset('storage/'.$item->image) }}" class="img-fluid" alt="">
                                @else
                                    <div class="text-muted text-center py-5">No Image</div>
                                @endif
                            </a>


                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                                </span>

                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.about.certifications.edit', $item) }}">Edit</a>

                                    <form method="POST" action="{{ route('admin.about.certifications.destroy', $item) }}"
                                          onsubmit="return confirm('Delete this certification?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-muted">No certifications yet.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
