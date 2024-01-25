<?php

namespace Modules\Admins\App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public $user;

    public function handle($request, Closure $next)
    {
        if (Auth::check() && auth()->user()->hasRole('admin')) {
            return $next($request);
        }
        return redirect()->to('dashboard');
    }
}
