<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login(Request $request)
    {
        $login = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $user = User::Where('name', $login["name"])->first();
        if (!$user) {
            return response()->json(['message' => "Username is not Found!", 422]);
        }
        if (!$user || !Hash::check($login["password"], $user->password)) {
            return response()->json(["message" => "Password is invalid", 422]);
        }
        $token = $user->createToken($login['name'])->plainTextToken;
        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }
}