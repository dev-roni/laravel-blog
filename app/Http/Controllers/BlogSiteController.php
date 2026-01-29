<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Carosel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class BlogSiteController extends Controller
{
     // search
    public function search(Request $request){
    $post_data = Post::where('post_title', 'like', '%' . $request->search . '%')
                     ->paginate(9); 
    foreach($post_data as $post){
        $post->short_content = Str::limit($post->post_content, 120,'');
        $post->category_data=Category::find($post->post_category);
            $post->category_name=$post->category_data->category_name;
    }
    $title = 'Search result';
    return view('site.site_article', compact('post_data', 'title'));
    }

    //home page
    public function blog_home(){
        $category_data=Category::select('id','category_name')->get();
         foreach ($category_data as $category) {
            $category->post_count = Post::where('post_category', $category->id)->count();
        }
        $carosels=Carosel::all();
        $post_data=Post::with('comments')->Paginate(4);
        foreach($post_data as $post){
            $post->short_content = Str::limit($post->post_content, 180,'');
            $post->category_data=Category::where('id',$post->post_category)->first();
            $post->category_name=$post->category_data->category_name;
        }
        $comm= session('pending_comment');
        $title="home page";
        return view('site.blog_home',compact('post_data','title','category_data','comm','carosels')); 
    }

    //article
    public function site_article(){
        $post_data=Post::Paginate(9);
         foreach($post_data as $post){
            $post->short_content = Str::limit($post->post_content, 120,'');
            $post->category_data=Category::find($post->post_category);
            $post->category_name=$post->category_data->category_name;
        }
        return view('site.site_article',compact('post_data'),['title' => 'article']); 
    }
    //post search on category
    public function site_category_search($categoryid){
        $post_data=Post::where('post_category',$categoryid)->Paginate(9);
        foreach($post_data as $post){
            $post->short_content = Str::limit($post->post_content, 120,'');
            $category_data=Category::find($post->post_category);
            $post->category_name=$category_data->category_name;
        }
        return view('site.site_article',compact('post_data'),['title' => 'article']); 
    }

    //single post show
     public function post_show(Request $request,$post_id){
        
        $post_data = Post::with('comments')->find($post_id);
        $title="see post";
        if(!Cookie::has('clicked'.$post_id)){
            $post_data->clicked += 1; 
            $post_data->save();
            Cookie::queue('clicked'.$post_id, true, 1440);
        }
       return view('site.post_show',compact('post_data','title')); 
    }

    //category
    public function site_category(){
        $category_data=Category::Paginate(4);
         foreach ($category_data as $category) {
            $category->post_count = Post::where('post_category', $category->id)->count();
            
        }
        //$postCount = Post::where('post_category','3')->count();
       return view('site.site_category',compact('category_data'),['title' => 'category']); 
    }

    //about
    public function site_about(){
       return view('site.site_about',['title' => 'about']); 
    }

    //contact
     public function site_contact(){
       return view('site.site_contact',['title' => 'contact']); 
    }
    
}
