<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Crypt;

class Controller extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   protected $account;

   public function __construct()
   {
      $this->middleware(function ($request, $next) {

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

         $this->account = $account;
         view()->share(compact('account'));

         return $next($request);
      });
   }
}
