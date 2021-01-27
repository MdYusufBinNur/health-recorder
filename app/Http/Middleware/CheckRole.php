<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $roleIds =  ['admin' => 'admin', 'doctor' => 'doctor', 'user' => 'user'];
        $allowedRoleIds = [];
        foreach ($roles as $role)
        {
            if(isset($roleIds[$role]))
            {
                $allowedRoleIds[] = $roleIds[$role];
            }
        }
        $allowedRoleIds = array_unique($allowedRoleIds);

        if(Auth::check()) {
            if(in_array(Auth::user()->role, $allowedRoleIds)) {
                return $next($request);
            }
        }

        return redirect('/home')->with('error','You are not allowed to access this files');

    }
}
