<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('backend.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:30'
        ]);

        $userList = User::where(['email'=>$request->email])->get();
        if(!empty($userList) && count($userList)>0)
        {
            $user = $userList->first();
            if(Hash::check($request->password, $user->password))
            {
                if( Auth::attempt(['email' => $request->email, 'password' => $request->password]) )
                {
                    if(Auth::check())
                    {
                        $notification = ['message'=>"user authenticate successfully",'type'=>'danger'];
                        return redirect()->route('backend.dashboard');
                    }
                }
                else
                {
                    $notification = ['message'=>"authentication failed",'type'=>'danger'];
                    return redirect()->route('backend.login.page')->with($notification);
                }
            }
            else
            {
                $notification = ['message'=>"credentials wrong",'type'=>'danger'];
                return redirect()->route('backend.login.page')->with($notification);
            }
        }
        else
        {
            $notification = ['message'=>"record not found",'type'=>'danger'];
            return redirect()->route('backend.login.page')->with($notification);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('backend.login.page');
    }
}
