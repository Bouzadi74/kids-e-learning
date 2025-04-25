<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $featuredContents = Content::with('category')->where('is_featured', true)->latest()->take(6)->get();
        $categories = Category::withCount('contents')->get();
        $totalContents = Content::count();
        
        // Get active users in the last 30 days, or total users if no active users
        $activeUsers = User::where('last_active_at', '>=', now()->subDays(30))->count();
        if ($activeUsers === 0) {
            $activeUsers = User::count();
        }
        
        return view('home', compact('featuredContents', 'categories', 'totalContents', 'activeUsers'));
    }
    
    public function categories()
    {
        $categories = Category::with(['contents'])->get();
        return view('categories', compact('categories'));
    }
    
    public function category(Category $category)
    {
        // Debug information
        \Log::info('Category ID: ' . $category->id);
        \Log::info('Category Name: ' . $category->name);

        $contentsQuery = $category->contents()->with('category')->latest();
        // Debug query
        \Log::info('SQL Query: ' . $contentsQuery->toSql());
        \Log::info('Query Bindings: ' . json_encode($contentsQuery->getBindings()));

        $contents = $contentsQuery->paginate(12);
        // Debug results
        \Log::info('Total Contents: ' . $contents->total());
        
        return view('category', compact('category', 'contents'));
    }
    
    public function content(Category $category, Content $content)
    {
        if ($content->category_id !== $category->id) {
            abort(404);
        }
        
        return view('content', compact('category', 'content'));
    }
}