<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;
use App\Models\Adminstrator;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $model = new Adminstrator();
        $api_token = $request->headers->get('api_token');
        if(!$api_token) return response()->json(['status' => 403, 'message' => 'Access denied'], Response::HTTP_FORBIDDEN);
        else {
            $tokenExist = $model->where('api_token', $api_token)->first();
            if($tokenExist) {
                $tokenNew = Str::random(60);
                $tokenExist->forceFill([
                    'api_token' => hash('sha256', $tokenNew),
                ])->save();
                $request->attributes->add(['token_refresh' => $tokenExist->api_token]);
                return $next($request);
            }
            return response()->json(['status' => 403, 'message' => 'Access denied'], Response::HTTP_FORBIDDEN);
        }
    }
}