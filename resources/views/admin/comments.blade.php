@extends('admin.layout')
@section('content')
<!-- মূল কন্টেন্ট -->
    <div class="container ">
        <!-- ফিল্টার সেকশন -->
        <div class="filter_section">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="statusFilter" class="form-label">স্ট্যাটাস</label>
                    <select class="form-select" id="statusFilter">
                        <option value="all">সব কমেন্ট</option>
                        <option value="approved">অনুমোদিত</option>
                        <option value="pending">পেন্ডিং</option>
                        <option value="rejected">রিজেক্টেড</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="postFilter" class="form-label">পোস্ট</label>
                    <select class="form-select" id="postFilter">
                        <option value="all">সব পোস্ট</option>
                        <option value="post1">বুটস্ট্রাপ 5 ব্যবহার করে ওয়েবসাইট ডিজাইন</option>
                        <option value="post2">সেন্ট মার্টিন দ্বীপে একটি অবিস্মরণীয় সফর</option>
                        <option value="post3">প্রোডাক্টিভিটি বাড়ানোর ১০টি সহজ উপায়</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="searchComment" class="form-label">খুঁজুন</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchComment" placeholder="কমেন্ট খুঁজুন...">
                        <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- কমেন্ট লিস্ট -->
        <div class="row ">
            <div class="col-md-8">
                <h4 class="mb-4">সাম্প্রতিক কমেন্ট</h4>
                
                <!-- কমেন্ট কার্ড 1 -->
                <div class="comment-card p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="comment-author">রাহুল ইসলাম</span>
                            <span class="comment-date ms-2"><i class="bi bi-clock"></i> ২ দিন আগে</span>
                        </div>
                        <span class="badge badge-pending rounded-pill">পেন্ডিং</span>
                    </div>
                    <p class="mb-3">আপনার পোস্টটি খুবই তথ্যবহুল ছিল। ধন্যবাদ এমন একটি পোস্ট শেয়ার করার জন্য।</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="comment-post">বুটস্ট্রাপ 5 ব্যবহার করে ওয়েবসাইট ডিজাইন</a>
                        <div class="comment-actions">
                            <button class="btn btn-approve btn-sm"><i class="bi bi-check-circle"></i> অ্যাপ্রুভ</button>
                            <button class="btn btn-reject btn-sm"><i class="bi bi-x-circle"></i> রিজেক্ট</button>
                            <button class="btn btn-reply btn-sm"><i class="bi bi-reply"></i> রিপ্লাই</button>
                        </div>
                    </div>
                </div>
                
                <!-- কমেন্ট কার্ড 2 -->
                <div class="comment-card p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="comment-author">সুমাইয়া আক্তার</span>
                            <span class="comment-date ms-2"><i class="bi bi-clock"></i> ১ সপ্তাহ আগে</span>
                        </div>
                        <span class="badge badge-approved rounded-pill">অনুমোদিত</span>
                    </div>
                    <p class="mb-3">ভ্রমণ পোস্টটি পড়ে খুব ভালো লাগলো। আমি আগামী মাসে সেন্ট মার্টিন যাচ্ছি, আরও কিছু টিপস দিলে ভালো হয়।</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="comment-post">সেন্ট মার্টিন দ্বীপে একটি অবিস্মরণীয় সফর</a>
                        <div class="comment-actions">
                            <button class="btn btn-approve btn-sm" disabled><i class="bi bi-check-circle"></i> অ্যাপ্রুভ</button>
                            <button class="btn btn-reject btn-sm"><i class="bi bi-x-circle"></i> রিজেক্ট</button>
                            <button class="btn btn-reply btn-sm"><i class="bi bi-reply"></i> রিপ্লাই</button>
                        </div>
                    </div>
                </div>
                
                <!-- কমেন্ট কার্ড 3 -->
                <div class="comment-card p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="comment-author">আরিফুল হক</span>
                            <span class="comment-date ms-2"><i class="bi bi-clock"></i> ৩ সপ্তাহ আগে</span>
                        </div>
                        <span class="badge badge-approved rounded-pill">অনুমোদিত</span>
                    </div>
                    <p class="mb-3">প্রোডাক্টিভিটি সম্পর্কে আপনার পরামর্শগুলো খুবই কাজের। আমি নিয়মিত ফোকাস টাইমার ব্যবহার শুরু করেছি।</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="comment-post">প্রোডাক্টিভিটি বাড়ানোর ১০টি সহজ উপায়</a>
                        <div class="comment-actions">
                            <button class="btn btn-approve btn-sm" disabled><i class="bi bi-check-circle"></i> অ্যাপ্রুভ</button>
                            <button class="btn btn-reject btn-sm"><i class="bi bi-x-circle"></i> রিজেক্ট</button>
                            <button class="btn btn-reply btn-sm"><i class="bi bi-reply"></i> রিপ্লাই</button>
                        </div>
                    </div>
                </div>
                
                <!-- পেজিনেশন -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">পূর্ববর্তী</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">১</a></li>
                        <li class="page-item"><a class="page-link" href="#">২</a></li>
                        <li class="page-item"><a class="page-link" href="#">৩</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">পরবর্তী</a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!-- সাইডবার -->
            <div class="col-md-4">
                <!-- স্ট্যাটস কার্ড -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">কমেন্ট স্ট্যাটস</h5>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                মোট কমেন্ট
                                <span class="badge bg-primary rounded-pill">৪২</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                অনুমোদিত
                                <span class="badge bg-success rounded-pill">৩২</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                পেন্ডিং
                                <span class="badge bg-warning rounded-pill text-dark">৭</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                রিজেক্টেড
                                <span class="badge bg-danger rounded-pill">৩</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- দ্রুত একশন -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">দ্রুত একশন</h5>
                        <button class="btn btn-outline-primary w-100 mb-2"><i class="bi bi-check-all"></i> সবগুলো অ্যাপ্রুভ করুন</button>
                        <button class="btn btn-outline-danger w-100"><i class="bi bi-trash"></i> সিলেক্টেড ডিলিট করুন</button>
                    </div>
                </div>
                
                <!-- সর্বাধিক কমেন্টকারী -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">সর্বাধিক কমেন্টকারী</h5>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                রাহুল ইসলাম
                                <span class="badge bg-primary rounded-pill">১২</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                সুমাইয়া আক্তার
                                <span class="badge bg-primary rounded-pill">৮</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                আরিফুল হক
                                <span class="badge bg-primary rounded-pill">৫</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                জাহিদ হাসান
                                <span class="badge bg-primary rounded-pill">৪</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection