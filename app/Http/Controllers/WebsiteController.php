<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
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
        $products = Product::all();
        return view('website.shop', compact('products'));
    }

    public function shopCategory($id) {
        $products = Product::where('category_id', $id)->get();
        return view('website.shop', compact('products'));
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

    public function placeOrder(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required'
        ]);

        $cart = Cart::name('shopping');
        $items = $cart->getItems();
        $data["total"] = $cart->getItemsSubtotal();

        $order = Order::create($data);

        foreach($items as $hash => $item) {
            $orderItem = array(
                'order_id' => $order->id,
                'product_id' => $item->getId(),
                'price' => $item->getPrice(),
                'quantity' => $item->getQuantity(),
                'subtotal' => $item->getPrice() * $item->getQuantity()
            );

            OrderItem::create($orderItem);
        }
        $cart->clearItems();
        flash()->options([
            'position' => 'bottom-right',
        ])->success('Your order has been placed successfully...');

        return redirect()->route('website.index');
    }
}
