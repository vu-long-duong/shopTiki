<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Lấy locale từ session hoặc mặc định
        $locale = Session::get('locale', 'vi');

        // Cài đặt locale
        if (in_array($locale, ['vi', 'en']))
            App::setLocale($locale); 
        else 
            App::setLocale('vi');

        return $next($request);
    }
}
