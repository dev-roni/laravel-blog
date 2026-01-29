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
            
            <!-- শিরোনাম সেকশন -->
            <div class="mb-4">
              <label for="editTitle" class="form-label fw-bold">পোস্ট শিরোনাম</label>
              <input type="text" class="form-control form-control-lg rounded-3" id="editTitle" 
                     name="post_title" value="{{ old('post_title', $postdata->post_title) }}" required>
              @error('post_title')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <!-- ক্যাটাগরি এবং ইমেজ সেকশন -->
            <div class="row mb-4">
              <div class="col-md-6">
                <label for="editCategory" class="form-label fw-bold">ক্যাটাগরি</label>
                <select class="form-select rounded-3" id="editCategory" name="post_category" required>
                  <option value="{{ $category_data->id }}" selected>{{ $category_data->category_name }}</option>
                  @foreach($categories as $category)
                    @if($category_data->id != $category->id)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endif
                  @endforeach
                </select>
                @error('post_category')
                  <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="col-md-6">
                <label for="editImage" class="form-label fw-bold">ফিচার্ড ইমেজ</label>
                <div class="input-group">
                  <input type="file" class="form-control rounded-3" id="editImage" name="image" 
                         aria-describedby="imageHelp">
                </div>
                <div id="imageHelp" class="form-text">JPEG, PNG বা JPG ফরম্যাট, সর্বোচ্চ 2MB</div>
                @error('image')
                  <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
                
                <!-- বর্তমান ইমেজ প্রিভিউ -->
                @if($postdata->image)
                <div class="mt-3">
                  <p class="mb-1 small text-muted">বর্তমান ইমেজ:</p>
                  <img src="{{ asset('storage/'.$postdata->image) }}" alt="Current Post Image" 
                       class="img-thumbnail rounded-3" style="max-height: 150px;">
                </div>
                @endif
              </div>
            </div>

            <!-- কন্টেন্ট সেকশন -->
            <div class="mb-4">
              <label for="editContent" class="form-label fw-bold">পোস্ট কন্টেন্ট</label>
              <textarea class="form-control rounded-3" id="editContent" name="post_content" 
                        rows="10" required>{{ old('post_content', $postdata->post_content) }}</textarea>
              @error('post_content')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <!-- ট্যাগস এবং স্ট্যাটাস সেকশন -->
            <div class="row mb-4">
              <div class="col-md-6">
                <label for="editTags" class="form-label fw-bold">ট্যাগস (ঐচ্ছিক)</label>
                <input type="text" class="form-control rounded-3" id="editTags" name="tags"
                       value="{{ old('tags', $postdata->tags) }}" placeholder="কমা দ্বারা পৃথক করুন">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold">স্ট্যাটাস</label>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="statusSwitch" name="is_published"
                         {{ $postdata->is_published ? 'checked' : '' }} value="1">
                  <label class="form-check-label" for="statusSwitch">
                    {{ $postdata->is_published ? 'প্রকাশিত' : 'খসড়া' }}
                  </label>
                </div>
              </div>
            </div>

            <!-- সাবমিট বাটন -->
            <div class="d-flex justify-content-between align-items-center mt-4">
              <button type="submit" name="submit" class="btn btn-success px-4 py-2 rounded-pill">
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