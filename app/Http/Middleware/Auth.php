<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            Session::get('login') === AdminController::LOGIN &&
            Session::get('password') === AdminController::PASSW
        ) {
            return $next($request);
        }

        return redirect()->route('admin.login');
    }
}
