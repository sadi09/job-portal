<?php

namespace App\Http\Middleware;

use App\Helper\JwtToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthEmployerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        if (!$token) {
            return redirect(route('employer.login'));
        }

        $result = JwtToken::VerifyToken($token);
        if ($result == 'unauthorized') {
            return redirect(route('employer.login'));
        } else if ($result == 'token_null') {
            return redirect(route('employer.login'));
        } else {
            if ($result->type != 'employer') {
                return redirect(route('employer.login'));
            } else {
                $request->headers->set("email", $result->userEmail);
                $request->headers->set("id", $result->id);
                return $next($request);
            }
        }
    }
}
