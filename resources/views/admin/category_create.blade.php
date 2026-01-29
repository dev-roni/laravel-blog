@extends('admin.layout')
@section('content')
<!-- পেজ হেডার -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 ><i class="bi bi-plus-circle me-2"></i> নতুন ক্যাটাগরি তৈরি করুন</h3>
            <a href="{{ route('category_manage') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i> ক্যাটাগরি লিস্ট
            </a>
        </div>

        <!-- ফর্ম কার্ড -->
        <div class="form-card">
            <form action="{{ route('category_create_input')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <!-- বেসিক ইনফো সেকশন -->
                <div class="form-section">
                    <h4><i class="bi bi-info-circle me-2"></i> মৌলিক তথ্য</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="categoryName" class="form-label">ক্যাটাগরি নাম <span class="text-danger">*</span></label>
                            <input type="text" name="category_name" class="form-control" id="categoryName" placeholder="ক্যাটাগরির নাম লিখুন" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="categorySlug" class="form-label">স্লাগ (URL) <span class="text-danger">*</span></label>
                            <input type="text" name="category_slug" class="form-control" id="categorySlug" placeholder="স্বয়ংক্রিয়ভাবে তৈরি হবে" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">বর্ণনা</label>
                        <textarea class="form-control" name="category_description" id="categoryDescription" rows="3" placeholder="ক্যাটাগরি সম্পর্কে সংক্ষিপ্ত বর্ণনা লিখুন"></textarea>
                    </div>
                </div>

                <!-- ইমেজ সেকশন -->
                <div class="mb-3">
                    <label for="image" class="form-label">ইমেজ নির্বাচন করুন:</label>
                    <input class="form-control" type="file" name="image" id="image" accept="image/*" required>
                </div>

                <!-- সেটিংস সেকশন -->
                <div class="form-section">
                    <h4><i class="bi bi-gear me-2"></i> অতিরিক্ত সেটিংস</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="parentCategory" class="form-label">প্যারেন্ট ক্যাটাগরি</label>
                            <select class="form-select" id="parentCategory">
                                <option value="">কোন প্যারেন্ট ক্যাটাগরি নেই</option>
                                <option value="1">প্রযুক্তি</option>
                                <option value="2">ভ্রমণ</option>
                                <option value="3">জীবনযাপন</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="categoryStatus" class="form-label">স্ট্যাটাস</label>
                            <select class="form-select" id="categoryStatus">
                                <option value="active">একটিভ</option>
                                <option value="inactive">ইনএকটিভ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="featuredCategory">
                        <label class="form-check-label" for="featuredCategory">
                            ফিচার্ড ক্যাটাগরি হিসেবে চিহ্নিত করুন
                        </label>
                    </div>
                </div>

                <!-- সাবমিট বাটন -->
                <div class="d-flex justify-content-end gap-3">
                    <button type="button" class="btn btn-draft">
                        <i class="bi bi-file-earmark me-2"></i> ড্রাফট হিসেবে সংরক্ষণ
                    </button>
                    <button type="submit" name="submit" class="btn btn-submit">
                        <i class="bi bi-save me-2"></i> ক্যাটাগরি প্রকাশ করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
	
    @endsection