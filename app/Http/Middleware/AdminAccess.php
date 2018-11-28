<?php

namespace App\Http\Middleware;

use Closure;
use App\User;


class AdminAccess
{
    /**
     * Check and compare the admin access token
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $unauthorized = response()->json(['error' => 'Not authorized.'],403);
        $user = $request->headers->has('x-api-key') ?
            User::where('access_token', $request->header('x-api-key'))->first() : null;
        
        if( $user !== null ) {
            return $next($request);
        } else {
            return $unauthorized;
        }
    }
}
