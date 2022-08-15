<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class SetAppLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //$locale = request('locale', Cookie::get('locale', config('app.locale')));
        //Cookie::queue('locale', $locale, 60 * 24 * 365);

        $locale = $request->route('locale');
        App::setLocale($locale);
        
        URL::defaults([
            'locale' => $locale,
        ]);

        Route::current()->forgetParameter('locale');
        
        return $next($request);
    }
}
