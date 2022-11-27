<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'nik'=> $request->nik,
            'tempat_tanggal_lahir'=> $request->tempat_tanggal_lahir,
            'nomer_hp'=> $request->nomer_hp
        ]);

        $token = $user->CreateToken('mytoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response([
            $response,
            'message' => 'Anda berhasil register'
        ],201);

    }

    public function login(Request $request)
    { 
        $fields = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // check email in database where $fields base on customer input
        $user = User::where('name', $fields['name'])->first();

        // check password in database where $fields base on customer input value
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'password atau username salah!'
            ],401);
        }


        // print new token
        $token = $user->createToken('mytoken')->plainTextToken;

        $response = [
            'user' =>$user,
            'token' =>$token
        ];

        return response($response,201); 
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'logout success',
        ], 200);
    }
}
