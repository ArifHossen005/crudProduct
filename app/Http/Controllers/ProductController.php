<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function show()
    {   
        $products = Product::all();
        return view('product.show',compact('products'));
    }

    public function create()
    {
        return view('product.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tempImg = null;
        if ($request->hasFile('image')) { // Changed 'img' to 'image'
            $tempImg = $request->file('image')->store('uploads', 'public');
        }

        Product::create([
            'title' => $request->title, // Fixed 'name' to 'title'
            'description' => $request->description,
            'image' => $tempImg,
        ]);

        return redirect()->route('product.manage')->with('success', 'Product created successfully');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tempImg = $product->image;
        if ($request->hasFile('image')) { // Changed 'img' to 'image'
            $tempImg = $request->file('image')->store('uploads', 'public');
            if ($product->image) {
                Storage::delete($product->image);
            }
        }

        $product->update([
            'title' => $request->title, // Fixed 'name' to 'title'
            'description' => $request->description,
            'image' => $tempImg,
        ]);

        return redirect()->route('product.manage')->with('success', 'Product updated successfully');
    }

    public function manage()
    {
        $products = Product::all();
        return view('product.manage', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

   

    public function delete(Product $product)
    {
        if ($product->image) { // Changed 'img' to 'image'
            Storage::delete($product->image);
        }
        $product->delete();

        return redirect()->route('product.manage')->with('success', 'Product deleted successfully');
    }
}
