<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function loginPage()
    {
        return response()->view("auth.login");
    }
    public function registerPage()
    {
        return response()->view("auth.register");
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            return redirect()->intended('/member');
        }
 
        return back()->withErrors([
            'username' => 'Data user tidak ada.',
        ])->onlyInput('username');
    }

    public function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'username' => 'required|string|min:5',
            'password' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        }

        $isUserExists = User::where("email", $request->input("email"))->first();
        if($isUserExists){
            return redirect("/register")->withErrors(['error' => 'Data user sudah ada'])->withInput();
        }
        
        $user = new User();
        $user->email = $request->input("email");
        $user->username = $request->input("username");
        $user->password = Hash::make($request->input("password"));
        
        $user->save();

        Auth::login($user);

        return redirect("member");
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
