<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();
// dd(Session()->get('is_login') ? 'Logged In' : 'Not Logged In');
        if (!Session()->get('is_login') && $routeName !== 'admin.login' && $routeName !== 'admin.verify_login') {
            return redirect()->route('admin.login');
        } else {
           
            if (Session()->get('is_login') && ($routeName === 'admin.login' || $routeName === 'admin.verify_login')) {
                return redirect()->route('admin.dashboard');
            }

             
        }

        if (!Session()->get('is_login')) {
            $cookieData = $request->cookie('admin_data');
            
            if ($cookieData) {
                $adminData = json_decode($cookieData, true);
                Session()->put('is_login', true);
                Session()->put('admin_id', $adminData['admin_id']);
                Session()->put('admin_name', $adminData['admin_name']);
                Session()->put('admin_email', $adminData['admin_email']);
                Session()->put('admin_role', $adminData['admin_role']);
                return redirect()->route('admin.dashboard');
            }
        }
        return $next($request);
    }
}
