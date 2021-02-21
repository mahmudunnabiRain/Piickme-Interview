<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'phone_number' => 'required|numeric|unique:users',
            'street' => 'required|max:100',
            'city' => 'required|max:100',
            'organization' => 'required|max:500',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6'
        ]);
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'street' => $request->street,
            'city' => $request->city,
            'organization' => $request->organization,
            'password' => Hash::make($request->password)
        ]);
        auth()->attempt($request->only('phone_number', 'password'));
        return redirect()->route('home');
    }
}
