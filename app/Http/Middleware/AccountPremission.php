<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AccountPremission
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
        if ($user = Admin::where('id', Auth::user()->id)->first()) {
            if ($user->hasRoles(['admin', 'author'])) {
                return $next($request);
            } else {
                return redirect()->back()->with('mess', 'Quyền hạn không đủ');
            }
        }
    }
}
