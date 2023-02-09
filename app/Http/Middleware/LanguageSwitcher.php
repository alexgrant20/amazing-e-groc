<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LanguageSwitcher
{
   public function handle($request, Closure $next)
   {
      if (!session()->has('locale')) {
         session()->put('locale', config()->get('app.locale'));
      }
      App::setLocale(session()->get('locale'));
      return $next($request);
   }
}
