<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request){
        try {
            // $validator = $request->validate([

            // ]);
            $validator = Validator::make($request->all(),[
                'email'     => 'required|email|exists:users,email',
                'password'  => 'required'
            ]);

            if ($validator->passes()) {
                if (Auth::attempt($request->only(['email','password']))) {

                    $user = User::where('email',$request->email)->first();

                    $token = $user->createToken("API TOKEN for ". $user->id)->plainTextToken;

                    return response([
                        'message'   => 'Logged in successful',
                        'status'    => true,
                        'token'     => $token
                    ],200);

                } else {
                    return response([
                        'message'   => 'credentials does not match',
                        'status'    => false
                    ],401);
                }

            } else {
                return response([
                    'message'   => 'Validation failed',
                    'status'    => false
                ],401);
            }


        } catch (Exception $e) {
            return response([
                'message'   => $e->getMessage(),
                'status'    => false
            ],500);
        }
    }

     public function logout(Request $request){
        try {
            $user = Auth::guard('sanctum')->user();
            if ($user) {
                $user->tokens()->delete();
                Auth::guard('sanctum')->logout();

                return response()->json([
                    'message' => 'User logged out'
                ]);
            }
            else{
                return response()->json([
                    'message' => 'User not found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }

    }
}
