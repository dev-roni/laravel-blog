@extends('admin.layout')
@section('content')
<!-- পেজ হেডার -->
<h3><i class="bi bi-file-earmark-plus me-2"></i> নতুন পোস্ট তৈরি</h3>
<p class="text-muted mb-4">আপনার নতুন ব্লগ পোস্ট তৈরি করুন এবং প্রকাশ করুন</p>

<!-- পোস্ট ফর্ম -->
<div class="post-form">
    <form action="{{ route('post_create_input') }}" method="POST">
        @csrf
        <!-- বেসিক ইনফো সেকশন -->
        <div class="form-section">
            <h4><i class="bi bi-info-circle me-2"></i> মৌলিক তথ্য</h4>
            <div class="mb-3">
                @if($errors->has('post_title'))
                    <label for="postTitle" class=" text-danger "> @error('post_title')  {{ $message }} @enderror</label>
                @else
                    <label for="postTitle" class="form-label">পোস্ট শিরোনাম </label>
                @endif
                <input type="text" name="post_title" value="{{ old('post_title') }}" class="form-control" id="postTitle" placeholder="আপনার পোস্টের শিরোনাম লিখুন" >
            </div>
            <div class="mb-3">
                @if($errors->has('slug'))
                    <label for="postSlug" class=" text-danger "> {{ $errors->first('slug') }}</label>
                @else
                <label for="postSlug" class="form-label">URL স্লাগ</label>
                @endif
                <input type="text" name="slug" class="form-control" id="postSlug" placeholder="পোস্টের URL অংশ">
                <div class="form-text">ইংরেজিতে ছোট হাতের অক্ষর, সংখ্যা এবং হাইফেন ব্যবহার করুন</div>
            </div>
        </div>

        <!-- কন্টেন্ট সেকশন -->
        <div class="form-section ">
            <h4 class="@error('post_content') text-danger @enderror"><i class="bi bi-file-text me-2 "></i>@error('post_content') {{ $message }} @else কন্টেন্ট @enderror</h4>
            <div class="mb-3">
                <textarea id="postContent" name="post_content" class="form-control " placeholder="এখানে কন্টেন্ট লিখুন">
                </textarea>
            </div>
        </div>

        <!-- ফিচার্ড ইমেজ সেকশন -->
        <div class="form-section">
            <h4><i class="bi bi-image me-2"></i> ফিচার্ড ইমেজ</h4>
            <div id="featuredImageUpload" class="featured-image-upload mb-3">
                <i class="bi bi-cloud-arrow-up" style="font-size: 2rem; color: var(--primary-light);"></i>
                <p class="mt-2">ফিচার্ড ইমেজ আপলোড করতে ক্লিক করুন বা ড্র্যাগ এন্ড ড্রপ করুন</p>
                <img id="featuredImagePreview" class="featured-image-preview" src="#" alt="ফিচার্ড ইমেজ প্রিভিউ">
                <input type="file" id="featuredImageInput" accept="image/*" style="display: none;">
            </div>
        </div>

        <!-- ক্যাটাগরি এবং ট্যাগ সেকশন -->
        <div class="form-section">
            <h4><i class="bi bi-tags me-2"></i> ক্যাটাগরি </h4>
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="postCategory" class="form-label">ক্যাটাগরি</label>
                    <select name="post_category" value="{{ old('$category->id') }}" class="form-select" id="postCategory" required>
                        <option selected disabled value="">ক্যাটাগরি নির্বাচন করুন</option>
                        @foreach($all_category as $category) 
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>



        <!-- পাবলিশ সেটিংস -->
        <div class="form-section">
            <h4><i class="bi bi-send me-2"></i> প্রকাশ সেটিংস</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="postStatus" class="form-label">স্ট্যাটাস</label>
                    <select class="form-select" name="post_status" id="postStatus" required>
                        <option value="published" selected>প্রকাশিত</option>
                        <option value="draft">খসড়া</option>
                        <option value="archive" >আর্কাইভ</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="postDate" class="form-label">প্রকাশের তারিখ</label>
                    <input type="datetime-local" class="form-control" id="postDate">
                </div>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="allowComments" checked>
                <label class="form-check-label" for="allowComments">কমেন্টের অনুমতি দিন</label>
            </div>
        </div>

        <!-- সাবমিট বাটন -->
        <div class="d-flex justify-content-between post_complete">
            <button type="button" class="btn btn-draft">
                <i class="bi bi-save me-2"></i>খসড়া হিসেবে সংরক্ষণ
            </button>
            <div>
                <button type="button" class="btn btn-secondary me-2">
                    <i class="bi bi-x-circle me-2"></i>বাতিল
                </button>
                <button type="submit" name="submit" class="btn btn-submit">
                    <i class="bi bi-send-check me-2"></i>প্রকাশ করুন
                </button>
            </div>
        </div>
    </form>
</div>
@endsection