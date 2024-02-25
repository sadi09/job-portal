<?php

namespace App\Http\Middleware;

use App\Helper\JwtToken;
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
        if ($request->cookie('token')) {
            $token_verify = JwtToken::VerifyToken($request->cookie('token'));
            if ($token_verify == 'unauthorized') {
                $user = [];
            } else {
                $user = $token_verify;
            }
        } else {
            $user = [];
        }
        $company_info = CompanyInfo::get()->first();
//        dd($user);
        View::share('company_info', $company_info);
        View::share('authUser', $user);

        return $next($request);
    }
}
