<?php

namespace App\Http\Middleware;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class GlobalMiddleware extends BaseMiddleware
{

    public function handle($request, Closure $next,$guard=null)
    {
        if($guard != null){
            auth()->shouldUse($guard);

            //this section to add autherization
            $token = request()->header('auth_token');
            request()->headers->set('auth_token', (string) $token, true);
            request()->headers->set('Authorization', 'Bearer' . $token, true);

            //this section to check this token is valid or no
            try{
                $user = JWTAuth::parseToken()->authenticate();
            }catch(\Exception $e){
                return response()->json([
                    'msg'=>'something wrong'
                ]);
            }//end of try
        }//end of if

        return $next($request);
    }
}
