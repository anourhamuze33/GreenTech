<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    public function toggle(int $id_product)
    {
        $user = User::find(Session::get('user_id'));
        $user->favorites()->toggle($id_product);
        return back();
    }
    public function index()
    {
        $user = User::find(Session::get('user_id'));
        // $products = $user->favorites;
        // $favorites = $user->favorites()->get()
        $products = $user->favorites()->paginate(8)->withQueryString();
        $nbrEpuise = $products->where('stock', '=', 0)->count();
        $nbrDisponible = $products->where('stock', '>', 0)->count();
        $nbrtotal = count($products);
        return view('productViews.favoritesProducts', [
            'products' => $products,
            'nbrEpuise' => $nbrEpuise,
            'nbrtotal' => $nbrtotal,
            'nbrDisponible' => $nbrDisponible
        ]);
    }
    public function filter(int $filter)
    {
        $user = User::find(Session::get('user_id'));
        $produit = $user->favorites()->paginate(8)->withQueryString();
        $nbrEpuise = $produit->where('stock', '=', 0)->count();
        $nbrDisponible = $produit->where('stock', '>', 0)->count();
        $nbrtotal = count($produit);

        switch ($filter) {
            case 2:
                $product = $user->favorites()->where('stock', '>', 0);
                break;
            case 3:
                $product = $user->favorites()->where('stock', '=', 0);
                break;
            case 1:
                $product = $user->favorites();
            break;
        }
        $products = $product->paginate(8)->withQueryString();
        return view('productViews.favoritesProducts', [
            'products' => $products,
            'nbrEpuise' => $nbrEpuise,
            'nbrtotal' => $nbrtotal,
            'nbrDisponible' => $nbrDisponible,
            'filter'=>$filter
        ]);
    }
}
