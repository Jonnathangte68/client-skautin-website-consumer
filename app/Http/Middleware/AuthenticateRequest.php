<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateRequest
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $loginToken = $request->session()->get('secret-login');
        if (empty($loginToken) || !$loginToken) { // && $request->input('login_token') !== $loginToken) {
            return redirect('/');
        }

        return $next($request);
    }

}