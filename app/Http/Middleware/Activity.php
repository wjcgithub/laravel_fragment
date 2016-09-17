<?php

namespace App\Http\Middleware;

use Closure;

class Activity
{
    /**
     * 前置操作
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        if (time() < strtotime('2016-09-15')) {
//            return redirect('activity');
//        }
//        return $next($request);
//    }

    /**
     * 后置操作
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        dump($response);
    }
}
