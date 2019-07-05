<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     $user = $request->getUser();
     $pass = $request->getPassword();
        if($user == '<※ベーシック認証のID>' && $pass = '<※ベーシック認証のパス>'){
           return $next($request);   #2)
        }
 
     $headers = ['WWW-Authenticate' => 'Basic'];
        return new Response('Invalid credentials.', 401, $headers);
  }
}
