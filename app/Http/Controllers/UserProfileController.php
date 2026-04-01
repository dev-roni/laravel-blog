<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\postValidation;
use App\Http\Requests\postUpdateValidation;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class UserProfileController extends Controller
{
    //user profile page
    public function index(){
        $profile_data=User::find(auth()->id());
        if(!$profile_data){
            return redirect()->back()->with('falied', 'data is not found');
        }
        $post_data=Post::where('author',auth()->id())->latest()->paginate(8);
            foreach ($post_data as $post) {
            $category_name = Category::where('id', $post->post_category)->first();
            $post->category_name = $category_name->category_name;
        }
        $title="profile";
        return view('site.profile',compact('profile_data','title','post_data'));
    }

    //user profile picture update
    public function picture(Request $request){
        $request->validate([
            'profile_pic_url' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = auth()->user();

        // old image delete
        if ($user->profile_pic_url && Storage::disk('public')->exists($user->profile_pic_url)) {
            Storage::disk('public')->delete($user->profile_pic_url);
        }

        // new image upload
        $path = $request->file('profile_pic_url')->store('users', 'public');

        $user->update([
            'profile_pic_url' => $path
        ]);

        return back()->with('success', 'প্রোফাইল ছবি আপডেট হয়েছে');
    }

    //user profile data update
    public function user_data(Request $request){

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => ['required','regex:/^(01)[0-9]{9}$/','unique:users,phone,' . auth()->id(),],
        ]);
        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return back()->with('success', 'প্রোফাইল আপডেট হয়েছে');
    }

    //user password update
    public function password(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        // current password check
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'বর্তমান পাসওয়ার্ড সঠিক নয়']);
        }
        // update password
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with('success', 'পাসওয়ার্ড আপডেট হয়েছে');
    }

    public function post_create(){
        $all_category = Category::get();
        $post = new post();
        $title = 'post-create';
        return view('site.post_create',compact('title','all_category','post'));
    }

    public function post_store(postValidation $request){
        try {
            DB::beginTransaction();

            $validateData = $request->validated();

            $validateData['author'] = auth()->id();
            $validateData['clicked'] = 0;

            // image upload
            if ($request->hasFile('post_img')) {
                $path = $request->file('post_img')->store('posts', 'public');
                $validateData['post_img'] = $path;
            }

            Post::create($validateData);

            DB::commit();

            return redirect()->route('user.profile', auth()->id())->with('success', 'পোষ্ট সফলভাবে তৈরি হয়েছে');

        } catch (\Exception $e) {

            DB::rollBack();
            return back()->withInput()->with('error', 'কিছু সমস্যা হয়েছে! আবার চেষ্টা করুন');
        }
    }

    public function post_edit($id){
        $post = Post::find($id);
        $all_category = Category::get();
        $title = 'edit post';
        return view('site.post_create',compact('title','all_category','post'));
    }

    public function post_update(postUpdateValidation $request, $id)
    {
        $validateData = $request->validated();

        $post_input = Post::findOrFail($id);

        // 🔥 image update
        if ($request->hasFile('post_img')) {

            // ❌ old image delete
            if ($post_input->post_img && Storage::disk('public')->exists($post_input->post_img)) {
                Storage::disk('public')->delete($post_input->post_img);
            }

            // ✅ new image upload
            $path = $request->file('post_img')->store('posts', 'public');
            $validateData['post_img'] = $path;
        }

        $post_input->update($validateData);

        return redirect()
            ->route('user.profile', auth()->id())
            ->with('success', 'Post update successfully');
    }

    //post delete
    public function post_delete($id){
        $postdata=Post::findOrFail($id);
        if($postdata->delete()){
            return redirect()->route('user.profile',auth()->id())->with('success','post deleted successfully');
        }
    }
}
