<?php
namespace App\Http\Middleware;
use Closure;
class Cors
{
    public function handle($request, Closure $next)
    {
        // $trusted_domains = ["http://localhost:8082/", "http://10.0.0.143:4200"];
        
        // if(isset($request->server()['HTTP_ORIGIN'])) 
        // {
        //     $origin = $request->server()['HTTP_ORIGIN'];

        //     if(in_array($origin, $trusted_domains)) 
        //     {
                
        //     }
        // }

        return $next($request)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Headers',' Origin, Content-Type, Authorization')
                ->header('Access-Control-Allow-Methods',' GET,PUT,POST,DELETE,PATCH,OPTIONS');
    }
}