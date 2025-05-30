<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $language = $request->header('Accept-Language','az');
        $langs = ['az','en','ru'];
        if(in_array($language,$langs)){
            app()->setLocale($language);
        }else{
            app()->setLocale('az');
        }
        return $next($request);
    }
}
