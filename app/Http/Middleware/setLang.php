<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class setLang
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
        $locale = $request->route('locale');
        if (! in_array($locale, ['en', 'ar'])) {
            $locale = config('app.locale'); // Default locale fallback
        }
        app()->setLocale($locale);
        return $next($request);

        // if (Session::has('locale')) {
        //     App::setLocale(Session::get('locale'));
        // } else {
        //     App::setLocale('ar'); // Default to Arabic if no locale is set
        // }

        // return $next($request);
    }
}
