<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
  //user search
  public function user_search(Request $request){
      $user_data = User::where('name', 'like', '%' . $request->search_user . '%')->get();
      $title = 'user Search result';
      return view('admin.users',compact('user_data','title'));
    }
  //user role search
    public function user_role_search($user_id){
      $user_data = User::where('user_role', $user_id)->get();
      $title = 'user role Search result';
      return view('admin.users',compact('user_data','title'));
  }
  //user management
  public function users(){
    $user_data = User::paginate(8);
    foreach($user_data as $user){
        $role=UserRole::where('id',$user->user_role)->first();
        $user->role_name=$role->role_name ?? 'Not assigned';
    }
    $title='users';
        return view('admin.users',compact('user_data','title'));
    }
  //user delete
  public function user_delete($user_id){
    $user_data = User::find($user_id);
    if($user_data->delete()){
        return redirect()->route('users')->with('success','user deleted successfully');
      }
    }
    //user edit view
    public function user_edit_view($user_id){
        $user_data=User::where('id', $user_id)->first();
        $user_role_data = UserRole::where('id', $user_data->user_role )->first();
        $all_roles=UserRole::get();
        return view('admin.user_edit',compact('user_data','user_role_data','all_roles'),['title' => 'user_post']);

    }
    //user edit update
    public function user_update(Request $request, $user_id){
        // Step 1: validate the user
            $validator = Validator::make($request->all(), [
            'user_name'    => 'required|string|max:150',
            'user_email' => 'required|email|unique:users,email',
            'password'  => 'required|min:8|confirmed',
        ], [
            'user_name.required'    => '! নাম দিন',
            'user_name.string'      => '! নাম অক্ষরের ব্যবহার করুন',
            'user_name.max'         => '! 150 অক্ষরের বেশি দেওয়া যাবে না',

            'user_email.required' => '! ইমেইল দিন',
            'user_email.string'   => '! @ এবং .com ব্যবহার করে আপনার ইমেইল দিন',
            'user_email.max'      => '! মেইলটি ইতিমধ্যে ব্যবহার হয়েছে',

            'password.required'  => '! পাশওয়ার্ড দিন',
            'password.string'    => '! পোষ্ট কন্টেন্ট অক্ষরের হতে হবে',
            'user_name.min'         => '! ৮ অক্ষরের বেশি পাশওয়ার্ড দিন',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($validator->passes()){
            $user_input =  User::find($user_id);
            $user_input->name    = $request->user_name;
            $user_input->email  = $request->user_email;
            $user_input->password  = $request->password;
            $user_input->user_role  = $request->password;
            if ($user_input->update()) {
                return redirect()->route('users',$user_id)->with('success', 'Post update successfully');
            } 
        }
    }
     //post delete
    public function post_delete($post_id){
        $postdata=Post::find($post_id);
        if($postdata->delete()){
            return redirect()->route('post_management')->with('success','post deleted successfully');
        }
    }
}