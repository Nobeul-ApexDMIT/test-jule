<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next, $permission)
  {
    // if the admin is logged in & he has a role defined then this check will be applied
    if (Auth::guard('admin')->check() && !empty(Auth::guard('admin')->user()->role)) {
      $admin = Auth::guard('admin')->user();

      $permissions = json_decode($admin->role->permissions, true);

      if (!in_array($permission, $permissions)) {
        return redirect()->back();
      }
    }

    return $next($request);
  }
}
