@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
            <li class="breadcrumb-item active">{{ $category->name }}</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card category-card">
                <div class="card-body">
                    <div class="row">
                        @if($category->image)
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid rounded" alt="{{ $category->name }}">
                            </div>
                        @endif
                        <div class="col-md-{{ $category->image ? '9' : '12' }}">
                            <h1>{{ $category->name }}</h1>
                            <p>{{ $category->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="section-title">Contents in {{ $category->name }}</h2>
    
    <div class="row">
        @forelse($contents as $content)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($content->image)
                        <img src="{{ asset('storage/' . $content->image) }}" class="card-img-top" alt="{{ $content->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $content->title }}</h5>
                        <p class="card-text">{{ Str::limit($content->description, 100) }}</p>
                        <a href="{{ route('content.show', [$category->slug, $content->slug]) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No content available in this category yet.</div>
            </div>
        @endforelse
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        {{ $contents->links() }}
    </div>
@endsection