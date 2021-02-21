<?php

namespace App\Http\Controllers\license;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class CreateLicenseController extends Controller
{
    public function index()
    {
        return view('license.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required|numeric',
            'license_for' => 'required',
        ]);

        $key = Crypt::encryptString($request->client_id."+".$request->license_for);
        return back()->with('license_key', $key);
    }

    public function getUserData($id)
    {
        $userData['data'] = User::find($id);
        echo json_encode($userData);
    }
}
