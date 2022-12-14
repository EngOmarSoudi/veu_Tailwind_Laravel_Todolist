<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Tasks extends Controller
{
    /**
     * create User
     * @param Request $request
     * @return User|\Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        try {
            $valdateUser = Validator::make($request->all(), [

                'email' => 'required|email',
                'password' => 'required',
            ]);
            if ($valdateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'massage' => 'validation failed',
                    'errors' => $valdateUser->errors(),
                ], 401);
            }
            $user = User::create([
               'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password) ,
            ]);
            return response()->json([
                'status' => true,
                'massage' => 'User Created successfully',
                'token' => $user->createToken('API TOKEN')->plainTextToken,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'massage' => $e->getMessage(),
            ], 500);
        }

    }
    public function loginUser(Request $request){
        try {
            $valdateUser = Validator::make($request->all(), [
//                'name' => 'required',
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ]);
            if ($valdateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'massage' => 'validation failed',
                    'errors' => $valdateUser->errors(),
                ], 401);
            }
            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json(['status' =>false,'massage'=>'does not match'],401);
            }
            $user=User::where('email', $request->email)->first();
//            return redirect(to:'api/test',headers:[
//                'Authentication' => 'Bearer '.$user->createToken('API TOKEN')->plainTextToken
//            ]);
            return response()->json([
                'status' =>true,
                'massage'=>'User Logged in',
                'token' => $user->createToken('API TOKEN')->plainTextToken,
                ],200);
        }catch (\Throwable $e){
            return response()->json([
                'status' => false,
                'massage' => $e->getMessage(),
            ], 500);
        }
    }
}
