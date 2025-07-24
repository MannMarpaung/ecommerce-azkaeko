<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->with('product')->get();

        return view('cart.index', compact('carts'));
    }

    public function store($prodcut_id)
    {
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $prodcut_id
        ]);

        return redirect()->route('cart.index');
    }
}
