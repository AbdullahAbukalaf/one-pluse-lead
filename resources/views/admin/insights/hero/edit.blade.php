@extends('admin.layout.master')
@section('title','Insights Hero (Video)')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Insights Hero (Video)</h4>


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.insights.hero.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Video (mp4/webm/ogg)</label>
                        <input type="file" name="video" class="form-control">
                        @error('video') <small class="text-danger">{{ $message }}</small> @enderror

                        @if(!empty($item?->video_path))
                            <div class="mt-3">
                                <video controls style="max-width: 100%; border-radius: 8px;">
                                    <source src="{{ asset('storage/' . $item->video_path) }}" type="video/mp4">
                                </video>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6 d-flex align-items-center">
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                @checked(old('is_active', $item->is_active ?? true))>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
