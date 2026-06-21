<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login berhasil',
                'token' => $token,
                'user' => $user,
                'role' => $user->role
            ]);
        }

        return response()->json([
            'message' => 'Email atau password salah'
        ], 401);
    }

public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validasi gagal',
            'errors' => $validator->errors()
        ], 422);
    }

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role ?? 'user'
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Register berhasil',
        'token' => $token,
        'user' => $user,
        'role' => $user->role
    ]);
}

public function registerAdmin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validasi gagal',
            'errors' => $validator->errors()
        ], 422);
    }

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'admin'
    ]);

    return response()->json([
        'message' => 'Register admin berhasil',
        'user' => $user,
        'role' => $user->role
    ], 201);
}

public function profile(Request $request)
{
    return response()->json([
        'id' => $request->user()->id,
        'name' => $request->user()->name,
        'email' => $request->user()->email,
        'role' => $request->user()->role
    ]);
}

public function updateProfile(Request $request)
{
    $user = $request->user();

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($user->id),
        ],
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validasi gagal',
            'errors' => $validator->errors()
        ], 422);
    }

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = $request->password;
    }

    $user->save();

    return response()->json([
        'message' => 'Profil berhasil diperbarui',
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ],
    ]);
}
}
