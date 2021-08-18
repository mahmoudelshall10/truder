<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['authenticate','register']]);
    }

    public function authenticate(Request $request)
    {
    
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

            $credentials = $request->only(['email', 'password']);

            try {
                if (!$token = Auth::guard('api')->attempt($credentials)) {
                    return response()->json(['message' => 'invalid credentials'], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['message' => 'could not create token'], 500);
            }


            $user = Auth::guard('api')->user();


            return response()->json(['message'=>'login successfully'],201)->header('Authorization',$token);


    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }


    protected function validator(array $data)
    {
        return Validator::make($data, User::$rules);
    }

    public function me()
    {
        return response()->json($this->guard()->user());
    }


    public function register(Request $request)
    {            
            $rules = [
                'name'                      => 'required|string',
                'email'                     => 'required|email|unique:users,email',
                'password'                  => 'required|min:8|confirmed',
            ];

            $names = [
                'name'                      => 'Name',
                'email'                     => 'Email',
                'password'                  => 'Password',
            ];

            $data = $this->validate($request,$rules , [],$names);

            $data['password'] = Hash::make($request->password);
            $data['role_id']  = 2;
            $user = User::create($data);
            $token = JWTAuth::fromUser($user);

            return response()->json(['message'=>'Registered successfully!'],201)->header('Authorization',$token);

    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user not found'], 404);
            }
        } catch (TokenExpiredException $e) {

            return response()->json(['token expired'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {

            return response()->json(['token invalid'], $e->getStatusCode());

        } catch (JWTException $e) {

            return response()->json(['token absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

    public function updateGeneralInformation(Request $request)
    {
        if (Auth::check())
        {
            $rules = 
            [
                'name'         => 'nullable|string',
                'email'        => 'sometimes|nullable|email|unique:users,email',
            ];

            $names = 
            [
                'name'         => 'Name',
                'email'        => 'Email',
            ];


            $user = $this->validate($request,$rules,[],$names);
            
            User::where('id',Auth::id())->update($user);

            return response()->json(['message'=>'Updated Successfully','data'=> $user]);

        }
    }



    public function resetPassword()
    {
        if (Auth::check())
        {
            $user = auth()->user();

            $rules = 
            [
                'old_password'              => 'required', 
                'password'                  => 'required|min:8|confirmed',
				'password_confirmation'     => 'required',
            ];

            $this->validate(request(),$rules);

            if (Hash::check(request('old_password'), $user->password)) { 

                $user->update([
                    'password' => Hash::make(request('password'))
                ]);
                
                 return response()->json(['message'=>'Password changed'],200);
                } else {

                return response()->json(['message'=>'Password does not match'],401);
             }
        }
    }

    public function logout()
    {
        // JWTAuth::invalidate();
       Auth::guard('api')->logout();

        return response()->json([
            'status'  => true,
            'message' => 'logout'
        ], 200);
        
    }

    private function guard()
    {
        return Auth::guard();
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }
}
