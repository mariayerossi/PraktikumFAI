<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CekLoginRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {//sebelum mengakses halaman login, dicek apa session "login" dan session "admin" nya ada? klo ga ada, dilanjutkan ke halaman login.
        //klo ada sessionnya, diarahkan ke halaman lain.
        if (Session::has("login")) {
            return redirect("/");
        }
        else if (Session::has("admin")) {
            return redirect("/dashboard");
        }
        return $next($request);
    }
}
