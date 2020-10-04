<?php

namespace App\Http\Middleware;

use App\Utils\AppConstant;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = Auth::guard(AppConstant::ADMIN_GUARD);
        if ($auth->check()) {
            return redirect(AppConstant::ADMIN_URL . 'dashboard');
        }
        return $next($request);
    }
}
