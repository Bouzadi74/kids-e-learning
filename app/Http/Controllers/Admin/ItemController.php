<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $contents = Content::with('category')->latest()->paginate(10);
        return view('admin.items.index', compact('contents'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio' => 'nullable|mimes:mp3,wav|max:5120',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20480',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'is_featured' => $request->has('is_featured'),
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('contents/images', 'public');
            $data['image'] = $imagePath;
        }

        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('contents/audios', 'public');
            $data['audio'] = $audioPath;
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('contents/videos', 'public');
            $data['video'] = $videoPath;
        }

        $content = Content::create($data);

        return redirect()->route('admin.items.index')
            ->with('success', 'Item created successfully');
    }

    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('admin.items.edit', compact('content', 'categories'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio' => 'nullable|mimes:mp3,wav|max:5120',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20480',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'is_featured' => $request->has('is_featured'),
        ];

        if ($request->hasFile('image')) {
            if ($content->image) {
                Storage::disk('public')->delete($content->image);
            }
            $imagePath = $request->file('image')->store('contents/images', 'public');
            $data['image'] = $imagePath;
        }

        if ($request->hasFile('audio')) {
            if ($content->audio) {
                Storage::disk('public')->delete($content->audio);
            }
            $audioPath = $request->file('audio')->store('contents/audios', 'public');
            $data['audio'] = $audioPath;
        }

        if ($request->hasFile('video')) {
            if ($content->video) {
                Storage::disk('public')->delete($content->video);
            }
            $videoPath = $request->file('video')->store('contents/videos', 'public');
            $data['video'] = $videoPath;
        }

        $content->update($data);

        return redirect()->route('admin.items.index')
            ->with('success', 'Item updated successfully');
    }

    public function destroy(Content $content)
    {
        // Delete associated files if they exist
        if ($content->image) {
            Storage::disk('public')->delete($content->image);
        }
        if ($content->audio) {
            Storage::disk('public')->delete($content->audio);
        }
        if ($content->video) {
            Storage::disk('public')->delete($content->video);
        }

        $content->delete();

        return redirect()->route('admin.items.index')
            ->with('success', 'Item deleted successfully');
    }
}
