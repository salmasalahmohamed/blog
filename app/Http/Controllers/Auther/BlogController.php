<?php

namespace App\Http\Controllers\Auther;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
public function form(){
    $category=Category::all();
    return view('user.create',get_defined_vars());
}
public function add(Request $request){
    $text=$request->file('logo');
    $image_name=time() .'.'.$text->getClientOriginalName();

    Blog::create([
        'image'=> $image_name,

    'user_id'=>Auth::user()->id,
        'slug'=>$request->slug,
        'title'=>$request->title,
        'description'=>$request->description,
        'meta_description'=>$request->metaDescription,
        'meta_keyword'=>$request->metaKeyword,
        'status'=>$request->status,
        'is_publish'=>$request->publish,
        'category_id'=>$request->category,



    ]);
    $request['logo']->move(public_path('images'),$image_name);
    return redirect()->back()->with('success','you added successfully');

}
public function index(){
    $blogs=Blog::all();
    return view('user.list',get_defined_vars());
}
public function edit($id){
    $category=Category::all();
    $blog=Blog::find($id);
    return view('user.edit',get_defined_vars());

}
public function update($id,Request $request){
    $blog=Blog::find($id);
    if (!empty($request->file('image'))){
        $image=time() .'.'.$request->image->getClientOriginalName();

    }
    $blog->update($request->all());

    $request['image']->move(public_path('images'),$image);
    return redirect()->back()->with('success','you update successfully');

}
public function destroy($id){
    Blog::destroy($id);
    return redirect()->back()->with('success','you deleted successfully');

}
}
