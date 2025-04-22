@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Featured Content</h1>
        <a href="{{ route('admin.items.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Item
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Media</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($featuredContents as $content)
                            <tr>
                                <td>{{ $content->id }}</td>
                                <td>
                                    @if ($content->image)
                                        <img src="{{ asset($content->image) }}" alt="{{ $content->title }}" width="50">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>{{ $content->title }}</td>
                                <td>{{ $content->category->name }}</td>
                                <td>
                                    @if ($content->audio)
                                        <span class="badge bg-info me-1">Audio</span>
                                    @endif
                                    @if ($content->video)
                                        <span class="badge bg-info">Video</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($content->is_featured)
                                        <span class="badge bg-success">Featured</span>
                                    @else
                                        <span class="badge bg-secondary">Not Featured</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.contents.edit', $content) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.contents.destroy', $content) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this content?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No featured content found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
