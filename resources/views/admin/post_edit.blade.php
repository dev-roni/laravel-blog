@extends('admin.Layout')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm mb-4">
        <div class="card-header text-white py-3" id="bg-primary">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
              <i class="bi bi-pencil-square me-2"></i>পোস্ট সম্পাদনা করুন
            </h5>
            <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">
              <i class="bi bi-arrow-left me-1"></i> ড্যাশবোর্ডে ফিরে যান
            </a>
          </div>
        </div>
        
        <div class="card-body">
          <form action="{{ route('post_update', $postdata->id) }}" method="POST" enctype="multipart/form-data">
              @csrf

              {{-- ALL ERRORS --}}
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul class="mb-0">
                          @foreach ($errors->all() as $error)
                              <li>👉 {{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <!-- Title -->
              <div class="mb-4">
                  <label class="form-label fw-bold">পোস্ট শিরোনাম</label>

                  <input type="text"
                        class="form-control form-control-lg rounded-3 @error('post_title') is-invalid @enderror"
                        name="post_title"
                        value="{{ old('post_title', $postdata->post_title) }}">

                  @error('post_title')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <!-- Category + Image -->
              <div class="row mb-4">

                  <div class="col-md-6">
                      <label class="form-label fw-bold">ক্যাটাগরি</label>

                      <select class="form-select rounded-3 @error('post_category') is-invalid @enderror"
                              name="post_category">

                          <option value="">Select Category</option>

                          @foreach($categories as $category)
                              <option value="{{ $category->id }}"
                                  {{ old('post_category', $postdata->post_category) == $category->id ? 'selected' : '' }}>
                                  {{ $category->category_name }}
                              </option>
                          @endforeach

                      </select>

                      @error('post_category')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="col-md-6">
                      <label class="form-label fw-bold">ফিচার্ড ইমেজ</label>

                      <input type="file"
                            class="form-control rounded-3 @error('post_img') is-invalid @enderror"
                            name="post_img">

                      @error('image')
                          <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror

                      <!-- Current Image -->
                      @if($postdata->post_img)
                          <div class="mt-3">
                              <p class="mb-1 small text-muted">বর্তমান ইমেজ:</p>
                              <img src="{{ asset('storage/'.$postdata->post_img) }}"
                                  class="img-thumbnail rounded-3"
                                  style="max-height: 150px;">
                          </div>
                      @endif

                  </div>

              </div>

              <!-- Content -->
              <div class="mb-3">
                  <label class="form-label">কন্টেন্ট</label>

                  <textarea name="post_content"
                          rows="10"
                          class="form-control @error('post_content') is-invalid @enderror"
                          placeholder="Write your post...">{{ old('post_content', $postdata->post_content) }}</textarea>

                  @error('post_content')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <!-- Tags + Status -->
              <div class="row mb-4">

                  <!-- Slug -->
                  <div class="mb-3">
                      <label class="form-label">URL স্লাগ</label>

                      <input type="text"
                          name="slug"
                          value="{{ old('slug',$postdata->slug) }}"
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
                              {{ old('post_status') == 'pending' ? 'selected' : '' }}>
                              আবেদিত
                          </option>

                          <option value="draft"
                              {{ old('post_status') == 'draft' ? 'selected' : '' }}>
                              খসড়া
                          </option>

                      </select>

                      @error('post_status')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

              </div>

              <!-- Buttons -->
              <div class="d-flex justify-content-between align-items-center mt-4">
                  <button type="submit" class="btn btn-success px-4 py-2 rounded-pill">
                      <i class="bi bi-check-circle me-2"></i>আপডেট করুন
                  </button>

                  <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                      <i class="bi bi-x-circle me-2"></i> বাতিল করুন
                  </a>
              </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- TinyMCE Editor -->
<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#editContent',
    plugins: 'advlist autolink lists link image charmap preview anchor table',
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    height: 500,
    content_style: 'body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; font-size: 16px; }'
  });
</script>

@endsection