<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Index
    public function index(Request $request)
    {
        // $products = Product::paginate(10);
        $products = Product::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10);
        return view('pages.products.index', compact('products'));
    }

    // Create
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('pages.products.create', compact('categories'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'stock' => 'required|numeric',
            'status' => 'required|boolean',
            'is_favorite' => 'required|boolean',
        ]);

        // Store the request
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->is_favorite = $request->is_favorite;
        $product->save();

        //Save Image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/images', $product->id . '.' . $image->getClientOriginalName());
            $product->image = 'storage/products/' . $product->id . '.' . $image->getClientOriginalName();
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product Create Successfully');
    }

    // Show
    public function show($id)
    {
        return view('pages.products.show');
    }

    // Edit
    public function edit($id)
    {
        return view('pages.products.edit');
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:category_id',

        ]);

        // Update the request
        // $product = Product::find($id);
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->category_id = $request->category_id;
        // $product->save();

        return redirect()->route('products.index')->with('Success', 'Product Update Successfully');
    }

    // Destroy
    public function destroy($id)
    {
        // delete the request
        $product = Product::find($id);
        $product->delete();
    }
}
