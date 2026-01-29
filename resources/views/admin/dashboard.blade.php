@extends('admin.layout')
@section('content')
<!-- স্ট্যাটস কার্ড -->
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="stats-card stats-card-1">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5>মোট পোস্ট</h5>
                    <h2>{{$post_count}}</h2>
                </div>
                <i class="bi bi-file-earmark-text"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stats-card stats-card-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5>ক্যাটাগরি</h5>
                    <h2>{{$category_count}}</h2>
                </div>
                <i class="bi bi-tags"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stats-card stats-card-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5>কমেন্টস</h5>
                    <h2>{{$comment_count}}</h2>
                </div>
                <i class="bi bi-chat-left-text"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stats-card stats-card-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5>ব্যবহারকারী</h5>
                    <h2>{{$user_count}}</h2>
                </div>
                <i class="bi bi-people"></i>
            </div>
        </div>
    </div>
</div>

<!-- রিসেন্ট পোস্ট এবং এক্টিভিটি ফিড -->
<div class="row mt-4">
    <div class="col-lg-8">
        <div class="recent-posts">
            <h4 class="mb-4"><i class="bi bi-file-earmark-text me-2"></i> সাম্প্রতিক পোস্ট</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>শিরোনাম</th>
                            <th>লেখক</th>
                            <th>ক্যাটাগরি</th>
                            <th>স্ট্যাটাস</th>
                            <th>তারিখ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_post as $postdata)
                        <tr>
                            <td>{{$postdata->post_title}}</td>
                            <td>{{$postdata->author}}</td>
                            <td>{{$postdata->postcategoryname}}</td>
                            @if($postdata->post_status == 'published')
                            <td><span class="badge-published ">Published</span></td>
                            @elseif($postdata->post_status == 'draft')
                            <td><span class="badge-draft ">Draft</span></td>
                            @elseif($postdata->post_status == 'pending')
                            <td><span class="bg-success rounded-pill text-white p-1">Pending</span></td>
                            @else
                            <td class="">No Status</td>
                            @endif
                            <td>{{ $postdata->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $all_post->onEachSide(5)->links() }}
            </div>
            <a href="{{ route('post_management') }}" class="btn btn-sm mt-3" style="background-color: var(--primary-dark); color: white;">সমস্ত পোস্ট দেখুন</a>
        </div>
    </div>
    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="activity-feed">
            <h4 class="mb-4"><i class="bi bi-activity me-2"></i> সাম্প্রতিক এক্টিভিটি</h4>
            <div class="activity-item">
                <h6>নতুন পোস্ট তৈরি করেছেন</h6>
                <p>বুটস্ট্রাপ 5 টিউটোরিয়াল</p>
                <div class="activity-time">১০ মিনিট আগে</div>
            </div>
            <div class="activity-item">
                <h6>একজন নতুন ব্যবহারকারী রেজিস্টার করেছেন</h6>
                <p>ইমেইল: user@example.com</p>
                <div class="activity-time">১ ঘন্টা আগে</div>
            </div>
            <div class="activity-item">
                <h6>একটি পোস্ট আপডেট করেছেন</h6>
                <p>সেন্ট মার্টিন ভ্রমণ গাইড</p>
                <div class="activity-time">৩ ঘন্টা আগে</div>
            </div>
            <div class="activity-item">
                <h6>৫টি নতুন কমেন্ট</h6>
                <p>প্রোডাক্টিভিটি টিপস পোস্টে</p>
                <div class="activity-time">আজ, সকাল ৯:৩০</div>
            </div>
            <div class="activity-item">
                <h6>সিস্টেম আপডেট সম্পন্ন</h6>
                <p>সংস্করণ ২.১.০</p>
                <div class="activity-time">গতকাল, রাত ১১:৪৫</div>
            </div>
        </div>
    </div>
</div>
@endsection