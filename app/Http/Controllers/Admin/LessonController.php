<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lesson;
use Symfony\Component\HttpFoundation\Request;

class LessonController extends Controller
{
    public function form(){
        return view('admin.lesson.create');
    }
    public function add(Request $request){
        Lesson::create($request->toArray());
        return redirect()->back()->with('success','you added successfully');
    }
    public function index(){
         $lessons=Lesson::all();
         return view('admin.lesson.list',get_defined_vars());
    }
    public function edit($id){
        $lesson=Lesson::find($id);
        if (!$lesson)
            return redirect()->with('error','this item not exist');

        return view('admin.class.edit',get_defined_vars());
    }
    public function update(Request $request,$id){
        $lesson=Lesson::find($id);
        if (!$lesson)
            return redirect()->with('error','this item not exist');

        $lesson->update($request->toArray());
        return redirect()->back()->with('success','you updated successfully');

    }public function destroy($id){
    Lesson::destroy($id);
    if (!Lesson::destroy($id))
        return redirect()->with('error','this item not exist');

    return redirect()->back()->with('success','you deleted successfully');}


}
