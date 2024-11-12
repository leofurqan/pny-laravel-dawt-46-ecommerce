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
        View::share('items', $items);
        return $next($request);
    }
}
