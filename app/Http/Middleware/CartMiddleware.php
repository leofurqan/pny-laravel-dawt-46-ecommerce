<?php

namespace App\Http\Middleware;

use Closure;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Jackiedo\Cart\Facades\Cart;
use Symfony\Component\HttpFoundation\Response;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cart = Cart::name('shopping');
        $items = $cart->getItems();
        $cart_count = $cart->countItems();
        $cart_total = $cart->getItemsSubtotal();
        View::share('items', $items);
        View::share('cart_count', $cart_count);
        View::share('cart_total', $cart_total);
        return $next($request);
    }
}
