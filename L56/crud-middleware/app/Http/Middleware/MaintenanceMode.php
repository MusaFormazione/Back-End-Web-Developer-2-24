<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Questo middleware mette il negozio in manutenzione dalle 9 alle 20(orario UTC)
        //attivo globalmente, controlla bootstrap/app
        if(now()->hour < 9 || now()->hour > 20){
            return response()->json(['error' => 'Sito in manutenzione'], 403);
        }

        return $next($request);
    }
}
