<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredContents = Content::where('is_featured', true)->take(6)->get();
        $categories = Category::take(4)->get();
        return view('home', compact('featuredContents', 'categories'));
    }
    
    public function categories()
    {
        $categories = Category::paginate(12);
        return view('categories', compact('categories'));
    }
    
    public function category(Category $category)
    {
        $contents = $category->contents()->paginate(12);
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