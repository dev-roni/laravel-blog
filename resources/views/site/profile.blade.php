@extends('site.layout')
@push('styles')
    <style>

        /* PROFILE HEADER */

        .profile-header {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .profile-picture-container {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 6px solid var(--primary-light);
        }

        .btn-change-picture {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: var(--primary-dark);
            color: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
        }

        .btn-primary{
            background: var(--primary-light)!important;
            border:none;
            border-radius:8px;
        }

        .btn-outline-dark{
            border-radius:8px;
        }

        .btn:hover{
            transform:translateY(-2px);
            transition:0.2s;
        }

        .btn-edit{
            background-color: var(--primary-light) !important;
            color: var(--primary-dark);
            border: none;
        }

        .btn-delete{
            background-color: #dc3545 !important;
            color: var(--white);
            border: none;
        }

        .profile-name {
            font-weight: 700;
            color: var(--primary-dark);
        }

        .stat-number {
            font-size: 22px;
            font-weight: 700;
        }

        .stat-label {
            font-size: 14px;
            color: #777;
        }

        /* CARD */

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background: #332D56 !important ; 
            color: white !important;
            border-radius: 12px 12px 0 0;
        }

        /* INFO */

        .info-item {
            margin-bottom: 12px;
        }

        .info-label {
            font-weight: 600;
            color: var(--primary-dark);
        }

        /* SOCIAL */

        .social-links {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .social-link {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            transition: 0.3s;
        }

        .social-link:hover {
            transform: translateY(-5px);
        }

        .facebook {
            background: #3b5998
        }

        .twitter {
            background: #1da1f2
        }

        .linkedin {
            background: #0077b5
        }

        .instagram {
            background: #e1306c
        }

        .github {
            background: #333
        }

        /* ACTIVITY */

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
            background: #eee;
        }

        .activity-item {
            position: relative;
            margin-bottom: 20px;
        }

        .activity-icon {
            position: absolute;
            left: -40px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
@endpush
@section('content')

    <!-- জাস্ট একটা কালারের ডিভ দেওয়ার জন্য -->
    <header class="blog-header ">
    </header>

    <!-- প্রফাইল কন্টেন্ট -->
    <div class="container ">

        <!-- প্রফাইল হেডার-->
        <div class="profile-header mb-3">

            <div class="row align-items-center">

                <div class="col-md-3 text-center">

                    <div class="profile-picture-container mx-auto">

                        <img src="{{ auth()->user()->profile_pic_url 
                            ? asset('storage/' . auth()->user()->profile_pic_url) 
                            : asset('storage/users/No_Image.jpg') }}" 
                            alt="Profile Image"
                            class="profile-picture" >

                        <button class="btn-change-picture" data-bs-toggle="modal" data-bs-target="#pictureModal">
                            <i class="bi bi-camera"></i>
                        </button>

                    </div>

                </div>

                <div class="col-md-5">

                    <h3 class="profile-name">{{$profile_data->name}}</h3>

                    <p class="text-muted">{{$profile_data->email}}</p>

                    <div class="d-flex gap-4 mt-3">

                        <div>
                            <div class="stat-number">{{$post_data->total()}}</div>
                            <div class="stat-label">Posts</div>
                        </div>

                        <div>
                            <div class="stat-number">5</div>
                            <div class="stat-label">Followers</div>
                        </div>

                        <div>
                            <div class="stat-number">12</div>
                            <div class="stat-label">Comments</div>
                        </div>

                    </div>

                </div>

                <div class="col-md-4 text-end">
                    <div class="d-flex flex-md-column flex-column gap-2 align-items-md-end align-items-center">
                        <button class="btn btn-primary px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="bi bi-pencil"></i> Edit Profile
                        </button>
                    
                        <button class="btn btn-outline-dark mt-3" data-bs-toggle="modal"
                            data-bs-target="#passwordModal">
                            Change Password
                        </button>
                    </div>

                </div>

            </div>

        </div>

        <div class="card">
            <!-- পোষ্ট হেডার এবং নতুন পোস্ট বাটন -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3> আপনার পোষ্ট সমূহ </h3>
                <a href="{{route('post.create')}}" class="btn" style="background-color: var(--primary-light); color: white;">
                    <i class="bi bi-plus-circle me-2"></i>নতুন পোস্ট তৈরি করুন
                </a>
            </div>


            <!-- পোস্ট টেবিল -->
            <div class="post-table">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="border border-top-0 border-4 rounded-bottom">
                            <tr>
                                <th width="5%">ক্রম</th>
                                <th width="30%">শিরোনাম</th>
                                <th width="15%">ক্যাটাগরি</th>
                                <th width="10%">স্ট্যাটাস</th>
                                <th width="15%">তারিখ</th>
                                <th width="10%">একশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post_data as $postdata)
                            <tr>
                                <td>{{$loop->iteration + ($post_data->currentPage() - 1) * $post_data->perPage()}}</td>
                                <td>{{$postdata->post_title}}</td>
                                <td>{{$postdata->category_name}}</td>
                                @if($postdata->post_status == 'published')
                                    <td><span class="bg-success rounded-pill text-white p-2">Published</span></td>
                                    @elseif($postdata->post_status == 'draft')
                                    <td><span class="bg-info rounded-pill text-white p-2">Draft</span></td>
                                    @elseif($postdata->post_status == 'pending')
                                    <td><span class="bg-dark rounded-pill text-white p-2">Pending</span></td>
                                    @else
                                    <td class="">No Status</td>
                                @endif
                                <td>{{ $postdata->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('post.edit',$postdata->id) }}" class="btn btn-sm btn-edit btn-action" >
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <!-- Trigger Delete Button -->
                                    <a href="#" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal{{ $postdata->id }}" 
                                    class="btn btn-sm btn-delete btn-action">
                                    <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Post Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $postdata->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h6 class="modal-title">পোষ্ট মুছে ফেলুন</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('user.post.delete',$postdata->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <div class="modal-body text-center">
                                                <p>আপনি কি নিশ্চিত যে আপনি এই ক্যাটাগরি মুছে ফেলতে চান?</p>
                                                <p class="text-danger">এই কাজটি পূর্বাবস্থায় ফেরানো যাবে না।</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                                                <button type="submit" name="submit" class="btn btn-danger">মুছে ফেলুন</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- পেজিনেশন -->
                {{ $post_data->onEachSide(1)->links() }}
            </div>
        </div>
    </div>



    <div class="modal fade" id="pictureModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>প্রোফাইল ছবি পরিবর্তন</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- ছবি আপলোড -->
                    <div class="col-12">
                        <form action="{{route('user.profile.picture')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input id="profile_pic_url" type="file" name="profile_pic_url" accept="image/*" class="form-control">

                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                        </form>

                        <!-- ছবি প্রিভিউ -->
                        <div id="imagePreview" class="mt-3 d-none">
                            <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Current Photo delete</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>

    <!-- EDIT PROFILE MODAL -->

    <div class="modal fade" id="editModal">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5>Edit Profile</h5>

                    <button class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <form action="{{route('user.profile.data')}}" method="POST" >
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input value="{{old('name',$profile_data->name)}}" name="name" class="form-control @error('name') is-invalid @enderror">
                                 @error('post_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input name="email" value="{{old('email',$profile_data->email)}}" class="form-control @error('email') is-invalid @enderror">
                                 @error('post_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <input name="phone" value="{{old('phone',$profile_data->phone)}}" class="form-control @error('phone') is-invalid @enderror">
                                 @error('post_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                </div>

            </div>

        </div>

    </div>

    <!-- PASSWORD MODAL -->

    <div class="modal fade" id="passwordModal">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5>Change Password</h5>

                    <button class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <form action="{{route('user.password')}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Current Password</label>
                            <input name="current_password" type="password" class="form-control">
                            @error('current_password') is-invalid @enderror
                        </div>

                        <div class="mb-3">
                            <label>New Password</label>
                            <input name="new_password" type="password" class="form-control">
                            @error('new_password') is-invalid @enderror
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control">
                            @error('new_password_confirmation') is-invalid @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>

                    </form>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>

        </div>

    </div>
@push('scripts')
<script>
    document.getElementById('profile_pic_url').addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const preview = document.getElementById('imagePreview');
                const img = document.getElementById('previewImg');

                preview.classList.remove('d-none');
                img.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection