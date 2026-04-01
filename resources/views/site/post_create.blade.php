@extends('site.layout')

@section('content')

<header class="blog-header text-center ">
        <h1 class="display-4 fw-bold">{{$post->exists ? 'পোষ্ট আপডেট' : 'পোষ্ট তৈরি' }}</h1>
</header>

<div class="container mt-4">

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5><i class="bi bi-plus-circle"></i>{{$post->exists ? 'পোষ্ট আপডেট' : 'পোষ্ট তৈরি' }} </h5>
        </div>

        <div class="card-body">

        @php
            $isEdit = $post->exists;
            $url = $isEdit ? route('post.update',$post->id) : route('post.store') ;
        @endphp
            <form action="{{$url}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif
                <div class="row">

                    <!-- LEFT -->
                    <div class="col-md-8">

                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label">পোস্ট শিরোনাম</label>

                            <input type="text"
                                name="post_title"
                                value="{{old('post_title',$post->post_title)}}"
                                class="form-control @error('post_title') is-invalid @enderror"
                                placeholder="Enter post title">

                            @error('post_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-3">
                            <label class="form-label">কন্টেন্ট</label>

                            <textarea name="post_content"
                                    rows="10"
                                    class="form-control @error('post_content') is-invalid @enderror"
                                    placeholder="Write your post...">{{old('post_content',$post->post_content)}}</textarea>

                            @error('post_content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="col-md-4">

                        <!-- Image -->
                        <div class="card mb-3">
                            <div class="card-header bg-dark text-white">
                                ফিচার্ড ইমেজ
                            </div>

                            <div class="card-body text-center">

                                <div class="upload-box @error('post_img') border-danger @enderror" id="uploadBox">

                                    <i class="bi bi-cloud-arrow-up upload-icon"></i>
                                    <p>Upload Image</p>

                                    <img id="previewImage" class="preview-img d-none">

                                    <input type="file" name="post_img" id="fileInput" accept="image/*" hidden>

                                </div>

                                @error('post_img')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">ক্যাটাগরি</label>

                            <select name="post_category"
                                    class="form-control @error('post_category') is-invalid @enderror">

                                <option value="">Select Category</option>

                                @foreach($all_category as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('post_category',$post->post_category) == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('post_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label class="form-label">URL স্লাগ</label>

                            <input type="text"
                                name="slug"
                                value="{{old('slug',$post->slug)}}"
                                class="form-control @error('slug') is-invalid @enderror">

                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">স্ট্যাটাস</label>

                            <select name="post_status"
                                    class="form-control @error('post_status') is-invalid @enderror">

                                <option value="pending"
                                    {{ old('post_status',$post->status) == 'pending' ? 'selected' : '' }}>
                                    পেন্ডিং
                                </option>

                                <option value="draft"
                                    {{ old('post_status',$post->status) == 'draft' ? 'selected' : '' }}>
                                    খসড়া
                                </option>

                            </select>

                            @error('post_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> প্রকাশ করুন
                            </button>

                            <a href="#" class="btn btn-outline-secondary">
                                বাতিল
                            </a>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>

</div>

@endsection

@push('styles')

<style>

.upload-box{
    border:2px dashed #ccc;
    padding:25px;
    border-radius:10px;
    cursor:pointer;
    transition:0.3s;
    text-align:center;
}

.upload-box:hover{
    border-color:#71c0bb;
    background:#f5fffd;
}

.upload-icon{
    font-size:40px;
    color:#71c0bb;
}

.preview-img{
    width:100%;
    max-height:200px;
    object-fit:cover;
    margin-top:10px;
    border-radius:8px;
}

</style>

@endpush

@push('scripts')

<script>

const uploadBox = document.getElementById("uploadBox");
const fileInput = document.getElementById("fileInput");
const preview = document.getElementById("previewImage");

uploadBox.addEventListener("click", () => fileInput.click());

fileInput.addEventListener("change", function () {

    const file = this.files[0];

    if(file){
        const reader = new FileReader();

        reader.onload = function(e){
            preview.src = e.target.result;
            preview.classList.remove("d-none");

            uploadBox.querySelector("p").style.display = "none";
            uploadBox.querySelector("i").style.display = "none";
        };

        reader.readAsDataURL(file);
    }

});

</script>

@endpush