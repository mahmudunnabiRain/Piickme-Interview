<?php

namespace App\Http\Controllers\license;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use \Datetime;

class ActiveLicenseController extends Controller
{
    public function index()
    {
        return view('license.active');
    }

    public function store(Request $request)
    {
        try {
            $decrypted = Crypt::decryptString($request->license_key);
        } 
        catch (DecryptException $e) {
            return back()->with('failure', 'Your License Is Invalid.');
        }

        $decrypted = explode("+",$decrypted);

        if(count($decrypted) != 2){
            dd("failed 1");
            return back()->with('failure', 'Your License Is Invalid.');
        }
        else{
            if(!is_numeric($decrypted[0])){
                dd("failed 2");
                return back()->with('failure', 'Your License Is Invalid.');
            }
            else{
                if(!($decrypted[1] === '3 Months' || $decrypted[1] === '6 Months' || $decrypted[1] === '12 Months')){
                    dd("failed 3");
                    return back()->with('failure', 'Your License Is Invalid.');
                }
            }
        }

        $id = $decrypted[0];

        if(!User::find($id)){
            return back()->with('failure', 'User Not Registered Yet.');
        }
        

        $license_for = $decrypted[1];
        $expire_date = new DateTime('now');

        if ($license_for === '3 Months'){
            $expire_date->modify('+3 month');
        }
        else if ($license_for === '6 Months'){
            $expire_date->modify('+6 month');
        }
        else if ($license_for === '12 Months'){
            $expire_date->modify('+12 month');
        }

        $expire_date = $expire_date->format('Y-m-d h:i:s');
        echo $expire_date;
        User::where('id', $id)->update([
            'expire_date' => $expire_date,
            'license_key' => $request->license_key
        ]);
        return back()->with('success', 'Your License Has Been Activated.');
    }
}
