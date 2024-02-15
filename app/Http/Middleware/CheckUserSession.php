<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckUserSession
{
    public function handle(Request $request, Closure $next)
    {
        // Add your authentication logic here
        if ($request->user() && ($request->user()->typeUtilisateur === 'admin' || $request->user()->typeUtilisateur === 'utilisateur' || $request->user()->typeUtilisateur === 'resElectrique')) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        return redirect('login1'); 
    }
}

?>