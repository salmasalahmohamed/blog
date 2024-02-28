<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function user(){
        $users=User::selection();
        return view('admin.user.list',get_defined_vars());
    }
    public function userForm(){
        return view('admin.user.create');
    }
    public function addUser(UserRequest $request){

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'email_verified_at'=>now(),
        ]);
        return redirect()->back()->with('success','you added successfully');

    }
    public function edit($id){
        $user=User::find($id);
        if(!$user){
            return redirect()->back()->with('error','user doesnt exist');

        }
        return view('admin.user.edit',get_defined_vars());

    }public function update($id,\Symfony\Component\HttpFoundation\Request $request){
        request()->validate(['name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,

        ]);
    $user=User::find($id);
    if(!$user){
        return redirect()->back()->with('error','user doesnt exist');

    }
    $user->update([$request]);
    return redirect()->back()->with('success','you updated successfully');

}
    public function delete($id){
        User::destroy($id);
        if(!User::destroy($id)){
            return redirect()->back()->with('error','user doesnt exist');

        }
        return redirect()->back()->with('success','you deleted successfully');

    }
}
