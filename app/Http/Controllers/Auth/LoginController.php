<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required|numeric',
            'password' => 'required|min:6'
        ]);
        if(!auth()->attempt($request->only('phone_number', 'password'), $request->remember)){
            return back()->with('failure','Invalid Login Credentials');
        }
        return redirect()->route('home');
    }
}
