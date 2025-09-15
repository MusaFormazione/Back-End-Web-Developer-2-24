<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pizza;

class CheckUnavailablePizza
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pizzaId = $request->route('id');

        // if(!$pizzaId) return $next($request);

        $pizza = Pizza::find($pizzaId);

        if(!$pizza) return response()->json(['error' => 'Not found'], 404);

        return $next($request);
    }
}
