<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     public function comment(){
        
        return view('admin.comments',['title' => 'comments']);
    }

    public function comment_store(Request $request, $post_id)
    {
        
        if (session()->has('pending_comment')) {
            $comment = new Comment();
            $comment->post_id = session()->get('comment_post_id');
            $comment->user_id = auth()->id(); 
            $comment->content = session()->pull('pending_comment');
            $comment->status = 'pending';
            $comment->save(); 
            //comment componene paite: ->with('commented',session()->pull('comment_post_id'))
            return redirect()->route('post_show',session()->pull('comment_post_id'))->with('success', 'Comment posted after login!');
        }

        
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->user_id = auth()->id(); 
        $comment->content = $request->input('content');
        $comment->status = 'pending';
        $comment->save();

        return redirect()->back()->with('success', 'Comment posted!')->with('commented',$post_id);
    }
    public function comment_delete($post_id){
        $comment=Comment::find($post_id);
        $comment->delete();
        return redirect()->back()->with('success','comment deleted successfuly');
    }

}