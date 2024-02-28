<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\ForgetPassword;
use App\Notifications\VerficationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AutherController extends Controller
{
    public function loginForm(){
        return view('admin.login');
    }
    public function registerForm(){
        return view('admin.register');
    }
    public function register(UserRequest $request){
        $data=$request->validated();
          $user=Admin::create($data);
          if (!empty($request->remember_token)) {
              $user->remember_token = Str::random(40);
              $user->save();
          }
       // $user->notify(new VerficationEmail($user));


        return redirect('login')->with('success','you registered successfully');
    }
    public function login(UserRequest $request){
        Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]);
        $user=Auth::guard('admin')->user();
        if (!empty($request->remember_token)) {
            $user->remember_token = Str::random(40);
            $user->save();
        }
           return redirect('dashboard')->with('success','you login successfully');

    }
    public function emailverifivation($token){
        $user=Admin::where('remember_token','=',$token)->first();
        $user->email_verified_at=date('Y-m-d H:i:s');
        $user->save();
        return redirect('dashboard')->with('success','you verify successfully');

    }public function forget(){
        return view('admin.forget');
}
    public function forgetpassword(Request $request){
        $remember_token = Str::random(40);
        DB::table('password_reset_tokens')->
        insert(['email'=>$request->email,'token'=>$remember_token]);
        $user=Admin::where('email','=',$request->email)->first();
        $user->notify(new ForgetPassword($remember_token));
    }
    public function resetform($token){
        return view('admin.reset',get_defined_vars());
    }
    public function reset(Request $request){
        DB::table('password_reset_tokens')->where('email',$request->email)->delete();
        $user=Admin::where('email','=',$request->email)->first();
        $user->update(['password'=>$request->password]);
        $user->save();
        return redirect()->back()->with('success','you updated successfully');


    }
    public  function logout(){
        Auth::guard('admin')->logout();
        return redirect('login')->with('success','you logout successfully');
    }
}
