@extends('site.layout')
@section('content')

<header class="blog-header text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">পোষ্ট পড়ুন</h1>  
    </div>
</header>
   
   <!-- মূল কন্টেন্ট -->
    <main class="container pt-1">
        <div class="row g-5">
            <div class="col-md-11">
                <!-- ব্লগ পোস্ট -->
                <article class="blog-post ">
                    <h1 class="card-title">{{$post_data->post_title}}</h1>
                    <p class="card-text">{{$post_data->created_at}}<a href="#">{{$post_data->author}}</a></p>
                    
                    <div class="mb-1">
                        <img src="{{$post_data->post_img}}" class="img-fluid rounded" alt="ব্লগ পোস্ট ইমেজ">
                    </div>
                    <hr>
                    <div>
                        <p>
                            {{$post_data->post_content}}
                        </p>
                    </div>
                </article>

                <!-- কমেন্ট সেকশন -->
                <section class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h4>মন্তব্যসমূহ:</h4>
                                @foreach($post_data->comments as $comment)
                                    <div class="mb-3 border p-2 rounded d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $comment->user->name ?? 'অতিথি' }}</strong><br>
                                            {{ $comment->content }}
                                        </div>
                                        
                                        @if(Auth::check() && $comment->user->id == Auth::user()->id)
                                            <span>
                                                <a class="btn btn-outline-danger btn-sm" href="{{ route('comment.delete', $comment->id) }}">
                                                    <i class="bi bi-trash"></i> Delete
                                                </a>
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            <h5 class="card-title">মন্তব্য করুন</h5>
                             <form action="{{ route('comment.store',$post_data->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post_data->id }}">
                                <div class="mb-3">
                                    <textarea name="content" class="form-control" placeholder="আপনার মন্তব্য লিখুন..." rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">মন্তব্য পোস্ট করুন</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
        @endsection