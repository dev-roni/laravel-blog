<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //category search
    public function category_search(Request $request){
        $all_category = Category::where('category_name', 'like', '%' . $request->search_category . '%')->get();
        $title = 'category Search result';
        $category_count=Category::count();
        return view('admin.category',compact('all_category','title', 'category_count'));
    }

    //category manage view
    public function category_manage(){
        $all_category=Category::select('id','category_name','category_description','category_slug','category_img','updated_at','created_at')->get();
        
        foreach ($all_category as $category) {
            $category->post_count = Post::where('post_category', $category->id)->count();
        }
        
        return view('admin.category',compact('all_category'),['title' => 'category_manage']);
    }

     //category create view
    public function category_create_view(){
        return view('admin.category_create',['title' => 'category_create']);
    }

     //category create input/store
    public function category_create_input(Request $request){
        
       $category_input = new Category();
       $category_input->category_name = $request->category_name;
       $category_input->category_description = $request->category_description;
       $category_input->category_slug = $request->category_slug;
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('category', $imagename, 'public');
            $category_input->category_img = $imagename;
        }
        
        if($category_input->save()){
           return redirect()->route('category_manage')->with('success', 'ক্যাটাগরি সফলভাবে তৈরি করা হয়েছে!');
        }
        else{return redirect()->back()->with('failed', 'ক্যাটাগরি  আপডেট হয়নি!');}
    }
    //category edit view
    public function category_edit_view($category_id){
        $category_data=Category::where('id',$category_id)->first();
        return view('admin.category_edit',compact('category_data'),['title' => 'category_edit']);
    }
     //category edit update
    public function category_update(Request $request, $category_id){
       $category_input = Category::find($category_id);
       $category_input->category_name = $request->category_name;
       $category_input->category_description = $request->category_description;
       $category_input->category_slug = $request->category_slug;
        
        if($category_input->update()){
           return redirect()->route('category_manage')->with('success', 'ক্যাটাগরি সফলভাবে আপডেট করা হয়েছে!');
        }
        else{return redirect()->back()->with('failed', 'ক্যাটাগরি  আপডেট হয়নি!');}
    }
    //category delete
    public function category_delete($category_id){
    $category_data = Category::find($category_id);
      if($category_data->delete()){
           return redirect()->route('category_manage')->with('success', 'ক্যাটাগরি সফলভাবে ডিলিট করা হয়েছে!');
        }
        else{return redirect()->back()->with('failed', 'ক্যাটাগরি  আপডেট হয়নি!');}
    }
}