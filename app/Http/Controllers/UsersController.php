<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    function login() {
        return view('login');
    }

    function register() {
        return view('usersView/register');
    }

    function registerUSer(Request $request, User $user) {
        $request->validate([
            "fullname" => "min:5",
            "email" => "required|email|unique:Users",
            "username" => "min:6|max:15|unique:Users",
            "password" => "min:6|max:10",
        ]);

        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $login = $user->save();

        if($login){
            return redirect("/")->with("successMsg","Registration was Successful !!");
        }
    }

    function loginUSer(Request $request, User $user) {
        $request->validate([
            "username" => "min:6|max:15",
            "password" => "min:6|max:10",
        ]);

        $checkUser = $user::where("username" , "=" , $request->username)->first();

        if($checkUser){

            if(Hash::check( $request->password , $checkUser->password )){
                Session()->put("userId",$checkUser->id);
                Session()->put("username",$checkUser->username);
                return redirect("dashboard");
            }
            else{
                return back()->with("errorMsg","Password is not Correct");
            }

        }
        else{
            return back()->with("errorMsg","User does not Exist");
        }
    }


    function dashboard(Request $request , User $user) {
        $users = $user::all();
        return view('usersView/dashboard',["users" => $users]);
    }

    function logout() {
        // $destroy = Session()->pull("recieverUsername","userId","username");
        $destroy = Session()->invalidate();
        if($destroy){
            return redirect("/");
        }
    }
}
