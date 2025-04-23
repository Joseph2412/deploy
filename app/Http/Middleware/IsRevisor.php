<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->is_revisor) {
            return $next($request); // se l’utente è autenticato E ANCHE revisore (visualizzare la dashboard del revisor)
        }
        
        return redirect()->route('homepage')->with('errorMessage', __('ui.revisor_area')); // invece  in tutti gli altri casi sarà reindirizzato alla homepage con un messaggio di errore
    }
}
