<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
 

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->only('name', 'parent_id'));
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
}
