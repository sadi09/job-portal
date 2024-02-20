<?php

namespace App\Http\Middleware;

use App\Models\CompanyInfo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class FetchCommonData
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $company_info = CompanyInfo::get()->first();
        View::share('company_info', $company_info);

        return $next($request);
    }
}
