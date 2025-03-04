<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    public function seller()
    {
        return view('seller.seller');
    }

    public function sellerRegister(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' =>  ['required', 'regex:/^\+?998[0-9]{9}$/'],
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'seller',
        ]);

        auth()->login($user);

        if (auth()->attempt($credentials)) {
            return redirect()->intended('/')->with('success', __("Sotuvchi sifatida ro'yxatdan o'tdingiz!"));
        }
        return back()->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
