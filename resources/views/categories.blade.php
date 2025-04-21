@extends('layouts.app')

@section('content')
    <h1 class="section-title">All Categories</h1>
    
    <div class="row">
        @forelse($categories as $category)
            <div class="col-md-3 mb-4">
                <div class="card h-100 category-card">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}" style="height: 150px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x150?text=No+Image" class="card-img-top" alt="No Image">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ Str::limit($category->description, 80) }}</p>
                        <a href="{{ route('category.show', $category->slug) }}" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No categories available yet.</div>
            </div>
        @endforelse
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        {{ $categories->links() }}
    </div>
@endsection