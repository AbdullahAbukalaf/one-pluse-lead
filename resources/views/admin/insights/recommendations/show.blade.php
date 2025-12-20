@extends('admin.layout.master')
@section('title', 'Recommendation Details')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Recommendation #{{ $item->id }}</h4>
            <a href="{{ route('admin.insights.recommendations.index') }}" class="btn btn-light btn-sm">Back</a>
        </div>

        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $item->name }}</p>
                <p><strong>Email:</strong> {{ $item->email }}</p>
                <p><strong>Country:</strong> {{ $item->country }}</p>
                <p><strong>Bought Before:</strong> {{ $item->bought_before ? 'Yes' : 'No' }}</p>
                <p>
                    <strong>Insight Type:</strong>
                    {{ $item->insightType
                        ? (app()->getLocale() === 'ar'
                            ? $item->insightType->title_ar
                            : $item->insightType->title_en)
                        : '—' }}
                </p>

                <p>
                    <strong>Category:</strong>
                    {{ $item->category
                        ? (app()->getLocale() === 'ar'
                            ? $item->category->title_ar
                            : $item->category->title_en)
                        : '—' }}
                </p>

                <hr>
                <p><strong>Recommendations:</strong></p>
                <div class="border rounded p-3">{{ $item->recommendations }}</div>
            </div>
        </div>
    </div>
@endsection
