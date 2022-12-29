<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CheckLoginAdmin
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
        // if (empty(session('usr')) || empty(session('pwd'))) {
        //     return redirect()->route('admin.auth.login');
        // }
        // $data_array = DB::table('users')->where('username', '=', session('usr'))->where('state', '=', 1)->get(['username', 'password'])->all();
        // // dd();
        // $usrs = $data_array[0];
        // if ($usrs->username === session('usr') && Hash::check(session('pwd'), $usrs->password)) {
        //     return $next($request);
        // }
        
        // return redirect()->route('admin.auth.login');

        if (Auth::check()) {
            // if (!empty($request->getRequestUri())) {
            //     session(['previousUri' => $request->getRequestUri()]);
            // }
            // dd($request->getRequestUri());
            return $next($request);
        }
        return redirect()->route('admin.auth.login');
    }
}
