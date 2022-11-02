<?php

namespace App\Http\Controllers;

use App\Services\UserAuthService;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use CanResetPassword;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private readonly UserAuthService $userAuthService)
    {
        $this->broker = 'users';
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users|email',
            'phone' => 'required|min:10|max:13',
            'password' => 'required|max:255',
        ]);

        return $this->userAuthService->register(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email'),
            $request->get('phone'),
            $request->get('password'),
        );
    }

    public function signIn(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
}
