<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;

class WebsiteController extends Controller
{
    public function index() {
        $categories = Category::where('status', 1)->get();
        $products = Product::where('featured', 1)->where('status', 1)->get();
        return view('website.index', compact('categories', 'products'));
    }

    public function shop() {
        return view('website.shop');
    }

    public function contact() {
        return view('website.contact');
    }

    public function about() {
        return view('website.about');
    }

    public function cart() {
        return view('website.cart');
    }

    public function addToCart(Request $request) {
        $cart = Cart::name('shopping');
        $product = Product::find($request->product_id);

        $cart->addItem([
            'id' => $product->id,
            'title' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'extra_info' => [
                'image' => $product->image
            ]
        ]);

        return redirect()->route('website.index');
    }

    public function clearCart(){
        $cart = Cart::name('shopping');
        $cart->clearItems();
        return redirect()->route('website.index');
    }

    public function checkout() {
        return view('website.checkout');
    }
}
