<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class MeController extends CommonController
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * ユーザー情報取得API
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request){
        return response()->json([
            'success' => true,
            'data' =>  Auth::user()
        ]);
    }

    /**
     * ログアウトAPI
     * @return \Illuminate\Http\JsonResponse]
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'success' => true,
        ]);
    }
}
