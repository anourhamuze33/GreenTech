<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use OpenAI\Laravel\Facades\OpenAI;

use function PHPUnit\Framework\returnArgument;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        $cate = $request->input('category');
        // if($category){
        //     $products = Product::with('category', function ($query) use ($category){
        //         $query->where('category_id', $category);
        //     });
        // }
        if ($cate) {
            $query->where('category_id', $cate);
        }



        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }
        $products = $query->paginate(8)->withQueryString();

        $categories = Category::all();
        return view('productViews.listProducts', compact('products', 'search', 'categories', 'cate'));

        //     $users = User::with('services', function($query) use ($category) {
        //      $query->where('category', 'LIKE', '%' . $category . '%');
        // })->get();
    }

    public function show(int $id)
    {
        // $product = Product::find($id);
        $product = Product::with('category')->findOrFail($id);
        return view('productViews.showProduct', compact('product'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('productViews.formAddProduct', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'supplier' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
    public function edit(int $id)
    {
        $categories = Category::all();
        $product = Product::with('category')->findOrFail($id);
        return view('productViews.formUpdateProduct', ['product' => $product, 'categories' => $categories]);
    }
    public function update(int $id, Request $request)
    {
        $product = Product::with('category')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'supplier' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        $product->update($validated);
        // $produit->fill($request->all())->save();
        return redirect()->route('product.show', $product)->with('success', 'Produit mis à jour avec succès!');
    }
    public function destroy(Product $product)
    {
        // $product->delete();
        $product->forceDelete();
        return redirect()->route('products.index')->with('success', 'Produit supprime avec succes');
    }
    public function filter(int $id)
    {
        $produits = Product::with('Category')->where('category_id', $id)->get();
        // $produits = json_encode($Produits);
        // return response()->json($Produits); for just cosole.log
        return view('productViews.filterProducts', compact('produits'));
    }
    public function generateDescription(string $name)
    {
        $validator = Validator::make(
            ['name' => $name],
            ['name' => 'required|string|max:255']
        );

        if ($validator->fails()) {
            return "errr";
        }

        $productName = $name;
        $response = OpenAI::chat()->create([
            'model' => 'openai/gpt-oss-20b',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a marketing expert writing attractive commercial product descriptions in French.'
                ],
                [
                    'role' => 'user',
                    'content' => "Rédige une description commerciale attractive sans symbols pour un produit nommé : $productName"
                ]
            ],
            'max_tokens' => 2000
        ]);
        $description = $response->choices[0]->message->content;
        return response()->json($description);
    }
}
