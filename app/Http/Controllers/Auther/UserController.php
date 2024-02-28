<?php

namespace App\Http\Controllers\Auther;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.login');
    }
    public function login(Request $request){
        Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password]);
        $user=Auth::guard('web')->user();
        if (!empty($request->remember_token)) {
            $user->remember_token = Str::random(40);
            $user->save();
        }
        return redirect('dashboard')->with('success','you login successfully');

    }
}
