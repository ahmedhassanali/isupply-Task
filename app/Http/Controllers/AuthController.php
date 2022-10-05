<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {

            return responseJson(401, 'Unauthorized');

        }

        $user = Auth::user();
        $user['token'] = $token;

        return responseJson(1, 'user logged in', $user);

    }//end of login

    public function register(Request $request)
    {
        $validatedata = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'tenant_id'=> 'required'
        ]);

        try{
            $validatedata['password'] = Hash::make($request->password);
            $validatedata['tenant_id'] = $request->tenant_id ;

            $user = User::create($validatedata);

            $token = Auth::login($user);
            $user['token'] = $token;

            return responseJson(1, 'User created successfully', $user);
            
        } catch (\Exception $e) {

            return responseJson(0,  $e->getMessage());

        }

    }//end of register

    public function logout()
    {
        try {

            Auth::logout();
            return responseJson(1, 'Successfully logged out');

        } catch (\Exception $e) {

            return responseJson(0, $e->getMessage());

        }


    }//end of logout

}
