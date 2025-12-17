@extends('admin.layout.master')
@section('title', 'Hero Section')

@section('content')
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h4 class="mb-0">Hero Section</h4>
                <small class="text-muted">Manage the homepage hero content and video sources.</small>
            </div>

            @if ($item)
                <a href="{{ route('admin.heroes.edit', $item) }}" class="btn btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit Hero
                </a>
            @endif
        </div>

        {{-- Alerts --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (!$item)
            <div class="alert alert-warning">
                No hero record found in database. Create one row for <strong>hero_sections</strong> table.
            </div>
        @else
            <div class="row g-3">

                {{-- Titles --}}
                <div class="col-lg-12">
                    <div class="card h-100">
                        <div class="card-header">
                            <strong>Content</strong>
                        </div>

                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="text-muted small mb-1">Title (EN)</div>
                                    <div class="p-3 border rounded bg-light">
                                        {{ $item->title_en ?: '—' }}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-muted small mb-1">Title (AR)</div>
                                    <div class="p-3 border rounded bg-light" dir="rtl">
                                        {{ $item->title_ar ?: '—' }}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-muted small mb-1">Status</div>
                                    <div class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->is_active ? 'Active' : 'Inactive' }}
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- Video Paths --}}
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="text-muted small mb-1">Video MP4 Path</div>
                                    <div class="d-flex align-items-center gap-2">
                                        <code class="flex-grow-1">{{ $item->video_mp4_path ?: '—' }}</code>
                                        @if ($item->video_mp4_path)
                                            <a class="btn btn-outline-secondary btn-sm"
                                                href="{{ asset($item->video_mp4_path) }}" target="_blank">
                                                Open
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="text-muted small mb-1">Video OGG Path</div>
                                    <div class="d-flex align-items-center gap-2">
                                        <code class="flex-grow-1">{{ $item->video_ogg_path ?: '—' }}</code>
                                        @if ($item->video_ogg_path)
                                            <a class="btn btn-outline-secondary btn-sm"
                                                href="{{ asset($item->video_ogg_path) }}" target="_blank">
                                                Open
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Quick Preview --}}
                            @if ($item->video_mp4_path || $item->video_ogg_path)
                                <div class="mt-4">
                                    <div class="text-muted small mb-2">Quick Preview</div>
                                    <div class="border rounded overflow-hidden">
                                        <video controls style="width:100%; height:auto; display:block;">
                                            @if ($item->video_mp4_path)
                                                <source src="{{ asset($item->video_mp4_path) }}" type="video/mp4">
                                            @endif
                                            @if ($item->video_ogg_path)
                                                <source src="{{ asset($item->video_ogg_path) }}" type="video/ogg">
                                            @endif
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        @endif

    </div>
@endsection
