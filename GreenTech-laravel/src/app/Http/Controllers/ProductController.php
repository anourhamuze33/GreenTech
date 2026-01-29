<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

use function PHPUnit\Framework\returnArgument;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('productViews.listProducts', ['products' => $products]);
    }
    public function show(int $id)
    {

    }
    public function create()
    {
        $categories = Category::all();
        return view('productViews.formAddProduct', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'description'=>'nullable|string',
            'supplier' => 'required|string|max:255',
            'price'=>'required|numeric',
            'stock'=> 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
}
