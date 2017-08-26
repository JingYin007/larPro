<?php
/**
 * Created by PhpStorm.
 * User: 百鬼夜行
 * Date: 2017/8/26
 * Time: 11:54
 */

namespace App\Http\Middleware;


use Closure;

class Activity
{
    /**
     * 前置操作
     * 逻辑在 请求之前进行的操作
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    /* public function handle($request,Closure $next){
         if (time() < strtotime('2017-8-26')){
             return redirect('activity');
         }
         return $next($request);
     }*/

    /**
     * 后置操作
     * 逻辑在 请求之后进行的操作
     * @param $request
     * @param Closure $next
     */
    public function handle($request,Closure $next){
        $response = $next($request);
        var_dump('后置');
        return $response;
    }
}