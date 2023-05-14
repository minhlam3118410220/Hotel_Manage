<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkManageLogin
{
    public function handle($request, Closure $next)
    {
            $adminData = session('adminData');

            if ($adminData && $adminData->first()->level == 2) {
                return $next($request);
            }

        return redirect('admin/login')->with('msg', 'Unauthorized access!');
    }
}
