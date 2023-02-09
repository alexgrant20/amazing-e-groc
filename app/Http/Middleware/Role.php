<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class Role
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */
   public function handle(Request $request, Closure $next, $role)
   {
      $auth = $request->session()->get('auth');
      $account = null;

      if ($auth) {
         $auth = session()->get('auth');

         try {
            $account = Crypt::decrypt($auth);
         } catch (\Exception $e) {
            session()->flush();
            return to_route('login')->with('error-swal', 'Something gone wrong, please re-authenticated!');
         }
      }

      if (!$account) return to_route('login');

      if ($account->hasRole($role)) {
         return $next($request);
      }

      return to_route('item.index');
   }
}
