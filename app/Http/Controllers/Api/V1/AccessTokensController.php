<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccessTokensController extends Controller
{


    /**
     * Display listing of the resource
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'device_name' => ['nullable'],
            'abilites' => ['array'],
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            // Authenticated
            $name = $request->input('device_name', $request->userAgent());
            $token = $user->createToken($name, $request->input('abilities', ['*']), now()->addDays(30));
            return [
                'access_token' => $token->plainTextToken,
                'user' => $user,
            ];
        }
        return response([
            'message' => 'Invalid credentails',
        ], 401);
    }

    // Revoke
    public function destroy()
    {
        $user = Auth::guard('sanctum')->user();
        // Delete current access token (Logout from current device)
        $user->currentAccessToken()->delete();
        return response([], 204);

        // Delete all tokens (Logout from all devices)
        $user->tokens()->delete();
    }

    public function index()
    {
        $user = Auth::guard('sanctum')->user();
        return $user->tokens;
    }
}
