<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // Nouvelle méthode: Trouver la catégorie par slug ET charger les contenus
        $category = Category::where('slug', $slug)->with('contents')->firstOrFail();

        // DEBUG: Vérifier la catégorie et les contenus chargés
        // dd($category, $category->contents);

        // Retourner la vue avec la catégorie et ses contenus
        return view('categories.show', compact('category'));
    }
}
