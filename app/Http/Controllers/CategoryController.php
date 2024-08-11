<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // Index
    public function index(Request $request)
    {
        // This is where you'll put the logic for your category page
        // $categories = Category::paginate(5);
        $categories = Category::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10);
        return view('pages.category.index', compact('categories'));
    }

    // Show
    public function show($id)
    {
        $category = Category::find($id);
        return view('pages.category.show', compact('category'));
    }
}
