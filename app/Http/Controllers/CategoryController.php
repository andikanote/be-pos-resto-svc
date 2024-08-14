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

    // Create
    public function create()
    {
        return view('pages.category.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the request
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        //Save Image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/category', $category->id . '.' . $image->getClientOriginalExtension());
            $category->image = 'storage/category/' . $category->id . '.' . $image->getClientOriginalExtension();
            $category->save();
        }

        return redirect()->route('category.index')->with('success', 'Product Create Successfully');
    }

    // Edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Update the request
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        //Save Image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/category', $category->id . '.' . $image->getClientOriginalExtension());
            $category->image = 'storage/category/' . $category->id . '.' . $image->getClientOriginalExtension();
            $category->save();
        }

        return redirect()->route('category.index')->with('success', 'Product Update Successfully');
    }

    // // Delete
    // public function destroy($id)
    // {
    //     $category = Category::find($id);
    //     $category->delete();
    //     return redirect()->route('category.index')->with('success', 'Category Delete Successfully');
    // }
}
