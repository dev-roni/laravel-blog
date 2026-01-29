@extends('site.layout')
@section('content')

    <!-- ক্যারousel সেকশন -->
    <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#blogCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#blogCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#blogCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            
            @foreach($carosels as $carosel)
                @if(in_array($carosel->carosel_select, ['first', 'second', 'third']))
                <!-- ক্যারousel আইটেম 1 -->
                <div class="carousel-item {{$carosel->carosel_select=='first'? 'active':''}}">
                    <img src="{{ asset('storage/category/' . $carosel->category->category_img) }}" class="d-block w-100" alt="প্রযুক্তি ব্লগ">
                    <div class="carousel-caption">
                        <h2>{{$carosel->category-> category_name}}</h2>
                        <p>{{$carosel->category-> category_description}}</p>
                        <a href="{{route('site_category_search',$carosel->categories_id)}}" class="btn btn-primary btn-lg">পড়ুন</a>
                    </div>
                </div>
                @endif
            @endforeach
            
            
    

        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">পূর্ববর্তী</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">পরবর্তী</span>
        </button>
    </div>

    <!-- মূল কন্টেন্ট -->
    <div class="container mt-5">
        <div class="row">
            <!-- ব্লগ পোস্ট -->
            <div class="col-lg-8">
                <h2 class="mb-4">সাম্প্রতিক পোস্ট</h2>



                <!-- ব্লগ কার্ড 1 -->
                 @foreach($post_data as $post)
                <div class="card blog-card overflow-hidden">
                    <div class="card-img-container">
                        <img src="../assets/img/feature-1.jpg" class="card-img-top" alt="ব্লগ পোস্ট ইমেজ">
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="badge bg-primary">{{$post->category_name}}</span>
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                        <h5 class="card-title">{{$post->post_title}}</h5>
                        <p class="card-text">
                        
                            @php
                                $content = $post->short_content;
                                $trimmedContent = '';
                                if (mb_strlen($content) > 7) { 
                                    $trimmedContent = mb_substr($content, 3, mb_strlen($content) -7);
                                } else {
                                    // যদি কন্টেন্ট খুব ছোট হয়, তাহলে এটি খালি দেখান বা আপনার পছন্দমতো কিছু করুন
                                    $trimmedContent = $content; // অথবা ''
                                }
                            @endphp
                            {{ $trimmedContent.'...'}}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                            <a href="{{route('post_show',$post->id)}}" class="btn outline-primary" >পড়ুন</a>
                            <small class="text-muted">
                                <i class="fas fa-eye me-1"></i> {{$post->clicked==0 ? '0' : $post->clicked}} বার দেখা হয়েছে
                            </small>
                            </div>
                             <a href="javascript:void(0)" class="text-decoration-none  me-2 comment" 
                                data-bs-toggle="modal" 
                                data-bs-target="#commentsModal{{ $post->id }}"
                                onclick="showComments({{ $post->id }})">
                                <i class="fas fa-comment"></i> {{$post->comments->count()}} টি কমেন্ট
                            </a>
                        </div>
                    </div>
                </div>

                @if(session()->has('commented'))
                    @php
                        $post_id=session('commented');
                    @endphp
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                        // মডেলটির আইডি পেতে পোস্টের আইডি ব্যবহার করা হয়েছে
                        const postId = {{ $post_id }};
                        const modalElement = document.getElementById(`commentsModal${postId}`);
                        
                        // যদি মডেলটি পাওয়া যায়, তবে এটি খুলে দিন
                        if (modalElement) {
                            const myModal = new bootstrap.Modal(modalElement);
                            myModal.show();
                        }

                        // সব মডেলের জন্য hidden ইভেন্ট হ্যান্ডলার
                        document.querySelectorAll('.modal').forEach(function (modalEl) {
                            modalEl.addEventListener('hidden.bs.modal', function () {
                                // backdrop remove
                                document.querySelectorAll('.modal-backdrop').forEach(e => e.remove());
                                // body থেকে modal-open ক্লাস সরানো
                                document.body.classList.remove('modal-open');
                                // body এর padding-right সরানো
                                document.body.style.removeProperty('padding-right');
                                // স্ক্রল ফেরানো
                                document.body.style.overflow = '';
                            });
                        });
                    });
                    </script>
                    
                <x-comments-model  :post="$post"  :post_id="$post_id"/>
                @endif
                <x-comments-model  :post="$post" :post_id="$post->id" />
                @endforeach
                
                <!-- পেজিনেশন -->
                    {{ $post_data->onEachSide(2)->links() }}

            </div>

			<div  class="col-lg-1">  </div>

            <!-- সাইডবার -->
            <div class="col-lg-3 homeside p-1">
                <!-- সার্চ বক্স -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">খুঁজুন</h5>
                        <form action="{{ route('search') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="খুঁজুন..." required>
                                <button class="btn bt-primary" name="submit" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- ক্যাটাগরি -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">ক্যাটাগরি</h5>
                        <ul class="list-group list-group-flush">
                            @foreach($category_data as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{route('site_category_search',$category->id)}}">{{$category->category_name}}</a>
                                <span class="badge bg-primary rounded-pill">{{ $category->post_count }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <!-- জনপ্রিয় পোস্ট -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">জনপ্রিয় পোস্ট</h5>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">বুটস্ট্রাপ 5 ব্যবহার করে ওয়েবসাইট ডিজাইন</a>
                            <a href="#" class="list-group-item list-group-item-action">সেন্ট মার্টিন দ্বীপে একটি অবিস্মরণীয় সফর</a>
                            <a href="#" class="list-group-item list-group-item-action">প্রোডাক্টিভিটি বাড়ানোর ১০টি সহজ উপায়</a>
                            <a href="#" class="list-group-item list-group-item-action">রিয়াক্ট জেএস শেখার সম্পূর্ণ গাইড</a>
                        </div>
                    </div>
                </div>
                
                <!-- ট্যাগ ক্লাউড -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ট্যাগ</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="#" class="btn btn-sm btn-outline-secondary">প্রযুক্তি</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">ওয়েব ডেভেলপমেন্ট</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">ভ্রমণ</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">বুটস্ট্রাপ</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">জাভাস্ক্রিপ্ট</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">জীবনযাপন</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection