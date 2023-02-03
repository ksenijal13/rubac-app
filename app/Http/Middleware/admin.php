<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin
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
        if($request->session()->has("user")){
            $user = $request->session()->get("user");

            if($user->naziv != "admin" && $user->naziv != "superAdmin"){
                return redirect("/login")->with("message", "MIDDLEWARE: NISTE ADMIN!!");
            }
            if($request->input('WorkflowID') == 1){
                if($request->ip() == '100.100.100.100'){
                    return $next($request);
                }else{
                    return redirect("/login")->with("message", "MIDDLEWARE: Nemate prava pristupa.");
                }
            }else{
                if($request->ip() == '100.100.100.1'){
                    return $next($request);
                }else{
                    return redirect("/login")->with("message", "MIDDLEWARE: Nemate prava pristupa.");
                }
            }
        }
        return $next($request);
    }
}
