<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login(Request $req)
    {
        $user =  User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return '<script>
                        alert("Incorrect email and password!!"); 
                        window.location.href="/";
                    </script>';
        }
        else
        {
            $req->session()->put('user',$user);
            return redirect('/home');
        }
    }

    public function signup(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|min:4',
            'email' => 'required|min:5|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);                   // Hash is used to encrypt password. To decrypt password, '$req->password;'
        $user->save();
        return '<script>
                    alert("Registration successfully completed!! Please login to your account"); 
                    window.location.href="/";
                </script>';
    }  
}
