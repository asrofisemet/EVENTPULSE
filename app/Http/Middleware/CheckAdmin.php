<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('role') !== 'admin') {
            return redirect('/dashboard');
        }
        return $next($request);
    }
}