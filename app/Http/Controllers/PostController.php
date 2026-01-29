<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Request\postValidation;

class PostController extends Controller
{
    //post search
     public function post_search(Request $request){
        $categories=Category::select('id','category_name')->get();
        $post_data = Post::where('post_title', 'like', '%' . $request->search_text . '%')->paginate(10);
        $title = 'Post Search result';
        return view('admin.post_management',compact('post_data','title','categories'));
    }
    //category search
     public function category_search($category_id){
        $categories=Category::select('id','category_name')->get();
        $data=['post_category' => $category_id];
        $post_data = Post::where($data)->paginate(10);
        $title = 'category Search result';
        return view('admin.post_management',compact('post_data','title','categories'));
    }
    //status search
     public function status_search($status){
        $categories=Category::select('id','category_name')->get();
        $post_data = Post::where('post_status', $status)->paginate(10);
        $title = 'post_status Search result';
        return view('admin.post_management',compact('post_data','title','categories'));
    }
    //Post management view
    public function post_management(){
        $categories=Category::select('id','category_name')->get();
        $post_data=Post::paginate(8);
            foreach ($post_data as $post) {
            $category_name = Category::where('id', $post->post_category)->first();
            $post->category_name = $category_name->category_name;
        }
        $title='Post Management';
        return view('admin.post_management',compact('post_data','title','categories'));
    }

     //Post create view
    public function post_create_view(){
        $all_category=Category::select('id','category_name')->get();
        $title='admin create post';
        return view('admin.create_post',compact('all_category','title'));
    }

    //Post create input/store
    public function post_create_input(Request $request){
        // Step 1: validate the post
        $request->validate([
            'post_title'    => 'required|string|max:255',
            'post_category' => 'required|string|max:100',
            'slug'          => 'required|string|max:100|unique:posts,slug',
            'post_content'  => 'required|string',
            'post_status'  => 'required|string',
        ], [ 
             //custom error massages
            'post_title.required'    => '! পোষ্টের টাইটেল দিন',
            'post_title.string'      => '! পোষ্ট টাইটেল অক্ষরের হতে হবে',
            'post_title.max'         => '! পোষ্ট টাইটেল 250 অক্ষরের বেশি হতে পারবে না',

            'post_category.required' => 'Post category dite hobe.',
            'post_category.string'   => 'Post category string hote hobe.',
            'post_category.max'      => 'Post category 100 characters er beshi hote parbe na.',

            'slug.required'          => '! স্লাগ দিতে হবে',
            'slug.string'            => '! স্লাগ অক্ষরের হতে হবে',
            'slug.max'               => '! স্লাগ ১০০ অক্ষরের বেশি হতে পারবে না',
            'slug.unique'            => '! এই স্লাগ ইতোমধ্যে ব্যবহার করা হয়েছে',

            'post_content.required'  => '! পোষ্ট কন্টেন্ট দিন',
            'post_content.string'    => '! পোষ্ট কন্টেন্ট অক্ষরের হতে হবে',

            'post_status'            => '!পোষ্ট স্টেটাস চেক করুন'
        ]);
        // Step 2: Store the post
        $post_input = new Post();
        $post_input->post_title    = $request->post_title;
        $post_input->post_category = $request->post_category;
        $post_input->slug          = $request->slug;
        $post_input->post_content  = $request->post_content;
        $post_input->author        = "boss";
        $post_input->post_status   = $request->post_status;

        if ($post_input->save()) {
            return redirect()->route('post_management')->with('success', 'Post update successfully');
        } 
        else {
            return redirect()->back()->with('failed', 'Post creation failed');
        }
    }
    //post approve
    public function post_approve($post_id){
        $post=Post::find($post_id);
        $post->post_status='published';
        $post->update();
        return redirect()->back()->with('success','post approved successfully');
    }
    //post view
    public function blog_post_view($post_id){
        $postdata=Post::where('id',$post_id)->first();
        $category_data = Category::select('id','category_name')->where('id',$postdata->post_category)->first();
        return view('admin.blog_post_view',compact('postdata','category_data'),['title' => 'view_post']);
    }
    
    //post edit view
    public function post_edit_view($post_id){
        $postdata=Post::where('id',$post_id)->first();
        $categories=Category::select('id','category_name')->get();
        $category_data = Category::select('id','category_name')->where('id',$postdata->post_category)->first();

        return view('admin.post_edit',compact('postdata','categories','category_data'),['title' => 'edit_post']);
    }
    //Post edit update
    public function post_update(postValidation $request, $post_id){
    
        $validateData= $request->validated();

        $post_input =  Post::find($post_id);

        if ($post_input && $post_input->update($validateData)) {
            return redirect()->route('blog_post_view',$post_id)->with('success', 'Post update successfully');
        } 
        else{return redirect()->back();}
    }
     //post delete
    public function post_delete($post_id){
        $postdata=Post::find($post_id);
        if($postdata->delete()){
            return redirect()->route('post_management')->with('success','post deleted successfully');
        }
    }
  
}