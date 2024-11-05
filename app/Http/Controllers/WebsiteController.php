<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function checkout() {
        return view('website.checkout');
    }
}
