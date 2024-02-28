<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        if (\Illuminate\Support\Facades\Request::has('search')){
             $categories=$categories->where('name',\Illuminate\Support\Facades\Request::get('search'));
        }
        return view('admin.category.list',get_defined_vars());
    }
    public function form(){
        return view('admin.category.create');
    }
    public function create(Request $request){
          Category::create($request->toArray());
        return redirect()->back()->with('success','you added successfully');

    }
    public function edit($id){
        $category=Category::find($id);
        if (!$category)
            return redirect()->with('error','this item not exist');
        return view('admin.category.edit',get_defined_vars());
    }
    public function update(Request $request,$id){
        $category=Category::find($id);
        if (!$category)
            return redirect()->with('error','this item not exist');
        $category->update($request->toArray());
        return redirect()->back()->with('success','you updated successfully');

    }public function destroy($id){
        Category::destroy($id);
    if (!Category::destroy($id))
        return redirect()->with('error','this item not exist');
    return redirect()->back()->with('success','you deleted successfully');

}

}
