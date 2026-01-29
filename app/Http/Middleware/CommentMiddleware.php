<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CommentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request,Closure $next): Response
    {
        if(!Auth::check()){
            $post_id = $request->route('post_id'); 
            session()->put('pending_comment', $request->content);
            session()->put('comment_post_id', $post_id);
           // session()->put('url.intended', url()->previous());
           session()->put('url.intended', route('comment.store', ['post_id' => $request->route('post_id')]));
           
            return redirect()->route('login');
        }
        return $next($request);
    }
}
