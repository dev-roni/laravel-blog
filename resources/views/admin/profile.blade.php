@extends('admin.layout')

@section('content')
<div class="container">
    <!-- প্রোফাইল হেডার -->
    <div class="profile-header mb-5">
        <div class="row align-items-center">
            <div class="col-md-2">
                <div class="profile-picture-container">
                    <img src="{{ $profile_data->profile_pic_url ?? 'assets/img/about.jpg'}}" class="profile-picture" alt="প্রোফাইল ছবি" style="max-width: 350px; max-height: 130px;">
                    <button class="btn btn-sm btn-change-picture" data-bs-toggle="modal" data-bs-target="#changePictureModal">
                        <i class="bi bi-camera"></i> ছবি পরিবর্তন
                    </button>
                </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
                <h2 class="profile-name">{{$profile_data->name}}</h2>
                <p class="profile-role text-muted"><i class="bi bi-person-badge"></i> {{$user_role_data->role_name}}</p>
                <div class="profile-stats d-flex gap-4 mt-3">
                    <div>
                        <span class="stat-number">১২৪</span>
                        <span class="stat-label">পোস্ট</span>
                    </div>
                    <div>
                        <span class="stat-number">৫৬</span>
                        <span class="stat-label">ফলোয়ার</span>
                    </div>
                    <div>
                        <span class="stat-number">৩৪২</span>
                        <span class="stat-label">কমেন্ট</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <button class="btn btn-edit-profile" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    <i class="bi bi-pencil"></i> প্রোফাইল এডিট করুন
                </button>
            </div>
        </div>
    </div>

    <!-- প্রোফাইল কন্টেন্ট -->
    <div class="row">
        <!-- ব্যক্তিগত তথ্য -->
        <div class="col-md-6">
            <div class="card profile-info-card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5><i class="bi bi-person-lines-fill"></i> ব্যক্তিগত তথ্য</h5>
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <span class="info-label"><i class="bi bi-envelope"></i> ইমেইল:</span>
                        <span class="info-value">{{$profile_data->email }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label"><i class="bi bi-telephone"></i> ফোন:</span>
                        <span class="info-value">+880 1XXX XXXXXX</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label"><i class="bi bi-calendar"></i> জন্ম তারিখ:</span>
                        <span class="info-value">১৫ জানুয়ারি, ১৯৯০</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label"><i class="bi bi-geo-alt"></i> ঠিকানা:</span>
                        <span class="info-value">১২৩/বি, ধানমন্ডি, ঢাকা-১২০৫</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label"><i class="bi bi-globe"></i> ওয়েবসাইট:</span>
                        <span class="info-value">www.ahsanhabib.com</span>
                    </div>
                </div>
            </div>

            <!-- সোশ্যাল মিডিয়া -->
            <div class="card social-media-card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5><i class="bi bi-share"></i> সোশ্যাল মিডিয়া</h5>
                </div>
                <div class="card-body">
                    <div class="social-links">
                        <a href="#" class="social-link facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-link linkedin"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-link instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link github"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- এক্টিভিটি এবং সেটিংস -->
        <div class="col-md-6">
            <!-- সাম্প্রতিক এক্টিভিটি -->
            <div class="card activity-card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5><i class="bi bi-activity"></i> সাম্প্রতিক এক্টিভিটি</h5>
                </div>
                <div class="card-body">
                    <div class="activity-timeline">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="bi bi-file-earmark-plus"></i>
                            </div>
                            <div class="activity-content">
                                <h6>নতুন পোস্ট তৈরি করেছেন</h6>
                                <p class="activity-text">"বুটস্ট্রাপ 5 টিউটোরিয়াল"</p>
                                <span class="activity-time">আজ, ১০:৩০ AM</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="bi bi-pencil"></i>
                            </div>
                            <div class="activity-content">
                                <h6>পোস্ট আপডেট করেছেন</h6>
                                <p class="activity-text">"সেন্ট মার্টিন ভ্রমণ গাইড"</p>
                                <span class="activity-time">গতকাল, ৩:৪৫ PM</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <div class="activity-content">
                                <h6>কমেন্ট করেছেন</h6>
                                <p class="activity-text">"প্রোডাক্টিভিটি বাড়ানোর উপায়" পোস্টে</p>
                                <span class="activity-time">২ দিন আগে, ১১:২০ AM</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="bi bi-gear"></i>
                            </div>
                            <div class="activity-content">
                                <h6>প্রোফাইল আপডেট করেছেন</h6>
                                <p class="activity-text">ব্যক্তিগত তথ্য পরিবর্তন</p>
                                <span class="activity-time">৩ দিন আগে, ৫:১৫ PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- অ্যাকাউন্ট সেটিংস -->
            <div class="card account-settings-card">
                <div class="card-header bg-primary text-white">
                    <h5><i class="bi bi-shield-lock"></i> অ্যাকাউন্ট সেটিংস</h5>
                </div>
                <div class="card-body">
                    <div class="settings-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>ইমেইল নোটিফিকেশন</h6>
                                <p class="text-muted mb-0">নতুন পোস্ট এবং কমেন্ট সম্পর্কিত নোটিফিকেশন</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="emailNotification" checked>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="settings-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>ডার্ক মোড</h6>
                                <p class="text-muted mb-0">এপ্লিকেশনের থিম পরিবর্তন করুন</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="darkMode">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="settings-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>পাসওয়ার্ড পরিবর্তন</h6>
                                <p class="text-muted mb-0">আপনার অ্যাকাউন্ট পাসওয়ার্ড আপডেট করুন</p>
                            </div>
                            <button class="btn btn-sm btn-change-password" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                পরিবর্তন করুন
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ছবি পরিবর্তন মোডাল -->
<div class="modal fade" id="changePictureModal" tabindex="-1" aria-labelledby="changePictureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePictureModalLabel">প্রোফাইল ছবি পরিবর্তন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('profile_picture_update',$profile_data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="image-upload-container text-center mb-3">
                        <i class="bi bi-cloud-arrow-up" style="font-size: 2rem; color: var(--primary-light);"></i>
                        <p class="mt-2">ছবি আপলোড করতে ক্লিক করুন বা ড্র্যাগ এন্ড ড্রপ করুন</p>
                        <img id="newProfilePicturePreview" class="image-preview" src="#" alt="নতুন প্রোফাইল ছবি">
                        <input type="file" name="profile_picture" id="newProfilePicture" accept="image/*" style="display: none;">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-danger btn-sm" id="removeProfilePicture">
                            <i class="bi bi-trash"></i> বর্তমান ছবি অপসারণ করুন
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                    <button type="submit" name="submit" class="btn btn-primary">সংরক্ষণ করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- প্রোফাইল এডিট মোডাল -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">প্রোফাইল তথ্য এডিট করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('profile_data_update',$profile_data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="Name" class="form-label">নাম</label>
                        <input type="text" name="name" class="form-control" id="Name" value="{{$profile_data->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">ইমেইল</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$profile_data->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">ফোন নম্বর</label>
                        <input type="tel"  name="phone" class="form-control" id="phone" value="+880 1XXX XXXXXX">
                    </div>
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">জন্ম তারিখ</label>
                        <input type="date"  name="date_of_birth" class="form-control" id="birthDate" value="1990-01-15">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">ঠিকানা</label>
                        <textarea class="form-control"  name="address" id="address" rows="2">১২৩/বি, ধানমন্ডি, ঢাকা-১২০৫</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">ওয়েবসাইট</label>
                        <input  name="website" class="form-control" id="website" >
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">বায়ো</label>
                        <textarea class="form-control"  name="biodata" id="bio" rows="3">আমি একজন ওয়েব ডেভেলপার এবং ব্লগার। নতুন প্রযুক্তি নিয়ে কাজ করতে ভালোবাসি।</textarea>
                    </div>
                
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                        <button type="submit" name="submit" class="btn btn-primary">পরিবর্তনসমূহ সংরক্ষণ করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- পাসওয়ার্ড পরিবর্তন মোডাল -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">পাসওয়ার্ড পরিবর্তন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('password_update',$profile_data->id)}}" method="POST">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">বর্তমান পাসওয়ার্ড</label>
                        <input type="password" name="current_password" class="form-control" id="currentPassword">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">নতুন পাসওয়ার্ড</label>
                        <input type="password" name="new_password" class="form-control" id="newPassword">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">নতুন পাসওয়ার্ড নিশ্চিত করুন</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirmPassword">
                    </div>
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> পাসওয়ার্ডে কমপক্ষে ৮টি অক্ষর, একটি সংখ্যা এবং একটি বিশেষ অক্ষর থাকা আবশ্যক।
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                <button type="submit" name="submit" class="btn btn-primary">পাসওয়ার্ড আপডেট করুন</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile picture upload functionality
        const newProfilePicture = document.getElementById('newProfilePicture');
        const newProfilePicturePreview = document.getElementById('newProfilePicturePreview');
        const removeProfilePicture = document.getElementById('removeProfilePicture');
        const imageUploadContainer = document.querySelector('#changePictureModal .image-upload-container');
        
        if (newProfilePicture && newProfilePicturePreview) {
            // Click to upload
            imageUploadContainer.addEventListener('click', function(e) {
                if (e.target.tagName !== 'IMG') {
                    newProfilePicture.click();
                }
            });

            // File selection handler
            newProfilePicture.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        newProfilePicturePreview.src = e.target.result;
                        newProfilePicturePreview.style.display = 'block';
                        imageUploadContainer.querySelector('i').style.display = 'none';
                        imageUploadContainer.querySelector('p').style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Remove profile picture
            removeProfilePicture.addEventListener('click', function() {
                newProfilePicture.value = '';
                newProfilePicturePreview.src = '';
                newProfilePicturePreview.style.display = 'none';
                imageUploadContainer.querySelector('i').style.display = 'block';
                imageUploadContainer.querySelector('p').style.display = 'block';
            });

            // Drag and drop functionality
            ['dragover', 'dragenter'].forEach(eventName => {
                imageUploadContainer.addEventListener(eventName, function(e) {
                    e.preventDefault();
                    this.style.borderColor = 'var(--primary-light)';
                    this.style.backgroundColor = 'rgba(113, 192, 187, 0.2)';
                });
            });

            ['dragleave', 'dragend'].forEach(eventName => {
                imageUploadContainer.addEventListener(eventName, function() {
                    this.style.borderColor = '#ddd';
                    this.style.backgroundColor = '#f9f9f9';
                });
            });

            imageUploadContainer.addEventListener('drop', function(e) {
                e.preventDefault();
                this.style.borderColor = '#ddd';
                this.style.backgroundColor = '#f9f9f9';
                
                const file = e.dataTransfer.files[0];
                if (file && file.type.match('image.*')) {
                    newProfilePicture.files = e.dataTransfer.files;
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        newProfilePicturePreview.src = e.target.result;
                        newProfilePicturePreview.style.display = 'block';
                        imageUploadContainer.querySelector('i').style.display = 'none';
                        imageUploadContainer.querySelector('p').style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Dark mode toggle
        const darkModeToggle = document.getElementById('darkMode');
        if (darkModeToggle) {
            darkModeToggle.addEventListener('change', function() {
                document.body.classList.toggle('dark-mode');
                // You can save the preference to localStorage here
            });
        }
    });
</script>
@endpush

@push('styles')
<style>
    /* প্রোফাইল স্পেসিফিক স্টাইল */
    .profile-header {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .profile-picture-container {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto;
    }

    .profile-picture {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid var(--primary-light);
    }

    .btn-change-picture {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: var(--primary-dark);
        color: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
    }

    .profile-name {
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 5px;
    }

    .profile-role {
        font-size: 1rem;
    }

    .profile-stats {
        margin-top: 15px;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-dark);
    }

    .stat-label {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .btn-edit-profile {
        background-color: var(--primary-dark);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
    }

    .btn-edit-profile:hover {
        background-color: var(--primary-medium);
    }

    /* প্রোফাইল ইনফো কার্ড */
    .profile-info-card, 
    .social-media-card,
    .activity-card,
    .account-settings-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }

    .info-item {
        margin-bottom: 15px;
    }

    .info-label {
        font-weight: 600;
        color: var(--primary-dark);
        margin-right: 10px;
    }

    .info-value {
        color: #6c757d;
    }

    /* সোশ্যাল মিডিয়া লিংক */
    .social-links {
        display: flex;
        gap: 15px;
        justify-content: center;
    }

    .social-link {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        text-decoration: none;
        transition: transform 0.3s;
    }

    .social-link:hover {
        transform: translateY(-5px);
    }

    .facebook { background-color: #3b5998; }
    .twitter { background-color: #1da1f2; }
    .linkedin { background-color: #0077b5; }
    .instagram { background-color: #e1306c; }
    .github { background-color: #333; }

    /* এক্টিভিটি টাইমলাইন */
    .activity-timeline {
        position: relative;
        padding-left: 40px;
    }

    .activity-timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 2px;
        background-color: #eee;
    }

    .activity-item {
        position: relative;
        margin-bottom: 20px;
    }

    .activity-icon {
        position: absolute;
        left: -40px;
        top: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--primary-light);
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .activity-content {
        padding-left: 15px;
    }

    .activity-text {
        color: #6c757d;
        margin-bottom: 5px;
    }

    .activity-time {
        font-size: 0.8rem;
        color: #adb5bd;
    }

    /* সেটিংস আইটেম */
    .settings-item {
        padding: 10px 0;
    }

    /* ডার্ক মোড স্টাইল */
    .dark-mode {
        background-color: #1a1a1a;
        color: #f8f9fa;
    }

    .dark-mode .card,
    .dark-mode .profile-header {
        background-color: #2d2d2d;
        color: #f8f9fa;
    }

    .dark-mode .info-value,
    .dark-mode .activity-text,
    .dark-mode .text-muted {
        color: #adb5bd !important;
    }

    .dark-mode .card-header {
        background-color: #332D56 !important;
    }
</style>
@endpush
@endsection