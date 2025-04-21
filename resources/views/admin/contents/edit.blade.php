@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Content: {{ $content->title }}</h1>
        <a href="{{ route('admin.contents.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Contents
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.contents.update', $content) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $content->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $content->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $content->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if($content->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $content->image) }}" alt="{{ $content->title }}" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    <div class="form-text">Recommended size: 800x600 pixels. Max size: 2MB. Leave empty to keep the current image.</div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="audio" class="form-label">Audio</label>
                    @if($content->audio)
                        <div class="mb-2">
                            <audio controls style="max-width: 100%;">
                                <source src="{{ asset('storage/' . $content->audio) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('audio') is-invalid @enderror" id="audio" name="audio">
                    <div class="form-text">Supported formats: MP3, WAV. Max size: 5MB. Leave empty to keep the current audio.</div>
                    @error('audio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="video" class="form-label">Video</label>
                    @if($content->video)
                        <div class="mb-2">
                            <video controls style="max-width: 100%; max-height: 300px;">
                                <source src="{{ asset('storage/' . $content->video) }}" type="video/mp4">
                                Your browser does not support the video element.
                            </video>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video">
                    <div class="form-text">Supported formats: MP4, MOV, AVI. Max size: 20MB. Leave empty to keep the current video.</div>
                    @error('video')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" {{ old('is_featured', $content->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">Featured Content</label>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Update Content
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection