<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Metadata\Uses;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'password'  => 'required',
            'password_confirmation' => 'required|same:password',
            'role' => 'required'
        ]);

        $validate['password'] = bcrypt($request->password);

        $user = User::create($validate);
        $success['token'] = $user->createToken('JayaApp')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json($success, Response::HTTP_CREATED);
    }
    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
    ])) {
            $user = Auth::user();
            if($user->role == 'A'){
                $success['token'] = $user->createToken('JayaApp')->plainTextToken;
            }else{
                $success['token'] = $user->createToken('JayaApp')->plainTextToken;    
            }
            $success['name'] = $user->name;
            return response()->json($success, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
