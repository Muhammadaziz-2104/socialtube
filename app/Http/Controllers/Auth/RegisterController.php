<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Ro'yxatdan o'tish jarayonini bajaradi.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */

     public function showRegistrationForm()
    {
        return view('auth.register'); // Bu yerda register view sahifangizni qaytaradi
    }

    public function register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
        ]);

        // Yangi foydalanuvchini tizimga kiritish
        Auth::login($user);

        return redirect()->route('home'); // Ro'yxatdan o'tgandan so'ng uy sahifasiga yo'naltirish
    }
}
