@extends('admin.Layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary rounded-pill">
                <i class="bi bi-arrow-left me-1"></i> ড্যাশবোর্ডে ফিরে যান
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-9">
            <div class="card shadow-lg border-0">
                <!-- পোস্ট হেডার ইমেজ -->
                <div class="post-header-image">
                    <img src="{{ asset('Assets/img/one.jpg') }}" class="card-img-top img-fluid rounded-top" 
                         alt="{{ $postdata->post_title }}" style="max-height: 400px; object-fit: cover;">
                </div>

                <!-- পোস্ট কন্টেন্ট -->
                <div class="card-body p-4 p-md-5">
                    <!-- পোস্ট টাইটেল এবং মেটা ইনফো -->
                    <div class="mb-4">
                        <h1 class="card-title display-5 fw-bold mb-3">{{ $postdata->post_title }}</h1>
                        
                        <div class="d-flex flex-wrap align-items-center text-muted mb-3">
                            <div class="d-flex align-items-center me-4">
                                <i class="bi bi-person-circle me-2"></i>
                                <span>{{ $postdata->author }}</span>
                            </div>
                            <div class="d-flex align-items-center me-4">
                                <i class="bi bi-calendar3 me-2"></i>
                                <span>{{ $postdata->created_at->format('F j, Y') }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-bookmark me-2"></i>
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    {{ $category_data->category_name }}
                                </span>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                    </div>

                    <!-- পোস্ট কন্টেন্ট -->
                    <div class="post-content mb-5">
                        {!! nl2br(e($postdata->post_content)) !!}
                    </div>

                    <!-- ট্যাগস (যদি থাকে) 
                    @if($postdata->tags)
                    <div class="mb-5">
                        <h5 class="mb-3">ট্যাগস:</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(explode(',', $postdata->tags) as $tag)
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    -->

                    <!-- একশন বাটন -->
                    <div class="d-flex flex-wrap gap-3 pt-4 border-top">
                        <a href="{{ route('post_edit_view', $postdata->id) }}" 
                           class="btn btn-primary px-4 py-2 rounded-pill">
                            <i class="bi bi-pencil-square me-2"></i> পোস্ট এডিট করুন
                        </a>
                        <a href="{{ route('post_delete', $postdata->id) }}" 
                           class="btn btn-outline-danger px-4 py-2 rounded-pill"
                           onclick="return confirm('আপনি কি নিশ্চিতভাবে এই পোস্টটি ডিলিট করতে চান?')">
                            <i class="bi bi-trash3 me-2"></i> পোস্ট ডিলিট করুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection