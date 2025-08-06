<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->has('search') && $request->search != '') {
            $products->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $products->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $products->orderBy('price', 'desc');
                    break;
                case 'rating_desc':
                    $products->orderBy('rating', 'desc');
                    break;
            }
        }

        $products = $products->get();

        return view('product.index', compact('products'));
    }
}
