 @extends('site.layout')
 @section('content')
 <!-- About হেডার -->
    <header class="blog-header text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">আমার সম্পর্কে</h1>
            <p class="lead">আমাকে আরও ভালোভাবে জানুন</p>
        </div>
    </header>

    <!-- About সেকশন -->
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-4 text-center">
                <img src="assets/img/feature-1.jpg" alt="আমার ছবি" class="profile-img mb-4 mb-lg-0">
            </div>
            <div class="col-lg-8">
                <h2 class="mb-3">আমি কে?</h2>
                <p class="lead">আমি একজন ওয়েব ডেভেলপার এবং ব্লগার</p>
                <p>আমার নাম জাহিদ হাসান এবং আমি ৫ বছর ধরে ওয়েব ডেভেলপমেন্টের সাথে যুক্ত আছি। আমি প্রযুক্তি, ভ্রমণ এবং জীবনযাপন নিয়ে ব্লগ লিখতে ভালোবাসি। আমার ব্লগে আপনি পাবেন বিভিন্ন টিউটোরিয়াল, জীবনযাপনের টিপস এবং আমার ব্যক্তিগত অভিজ্ঞতা।</p>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>নাম:</strong> জাহিদ হাসান</li>
                            <li class="mb-2"><strong>বয়স:</strong> ২৮ বছর</li>
                            <li class="mb-2"><strong>পেশা:</strong> ওয়েব ডেভেলপার</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>ইমেইল:</strong> jahid@example.com</li>
                            <li class="mb-2"><strong>ফোন:</strong> +880 1XXX XXX XXX</li>
                            <li class="mb-2"><strong>স্থান:</strong> ঢাকা, বাংলাদেশ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="my-5">
        
        <!-- কেন আমি ব্লগ লিখি -->
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h3 class="mb-4">কেন আমি ব্লগ লিখি?</h3>
                <p class="lead">জ্ঞান শেয়ার করা আমার একটি আবেগ</p>
                <p>আমি বিশ্বাস করি যে জ্ঞান শেয়ার করার মাধ্যমে আমরা সমৃদ্ধ হতে পারি। আমার ব্লগে আমি যা শিখি তা অন্যদের সাথে শেয়ার করার চেষ্টা করি। বিশেষ করে নতুন ডেভেলপারদের জন্য সহজ করে টিউটোরিয়াল লিখতে আমি ভালোবাসি। এছাড়াও ভ্রমণ এবং জীবনযাপনের অভিজ্ঞতা শেয়ার করলে সেটা অন্যদের জন্য উপকারী হতে পারে বলে আমি মনে করি।</p>
                <a href="blog.html" class="btn outline mt-3">আমার ব্লগ দেখুন</a>
            </div>
        </div>
         <hr class="my-5">
        <!-- দক্ষতা -->
        <div class="row mb-5">
            <div class="col-lg-6">
                <h3 class="mb-4">আমার দক্ষতা</h3>
                <div class="skill-item mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>HTML & CSS</span>
                        <span>95%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 95%"></div>
                    </div>
                </div>
                
                <div class="skill-item mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>JavaScript</span>
                        <span>85%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 85%"></div>
                    </div>
                </div>
                
                <div class="skill-item mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Bootstrap</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="skill-item mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>PHP</span>
                        <span>75%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 75%"></div>
                    </div>
                </div>
                
                <div class="skill-item mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>WordPress</span>
                        <span>80%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 80%"></div>
                    </div>
                </div>
                
                <div class="skill-item mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Photoshop</span>
                        <span>70%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="my-5">
        
        <!-- অভিজ্ঞতা এবং শিক্ষা -->
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h3 class="mb-4">কর্ম অভিজ্ঞতা</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <h5>সিনিয়র ওয়েব ডেভেলপার</h5>
                        <p class="text-muted">টেক সলিউশনস লিমিটেড | ২০২১ - বর্তমান</p>
                        <p>ওয়েব অ্যাপ্লিকেশন ডেভেলপমেন্ট, টিম লিডারশিপ এবং ক্লায়েন্ট ইন্টারঅ্যাকশনের দায়িত্ব পালন করছি।</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h5>জুনিয়র ওয়েব ডেভেলপার</h5>
                        <p class="text-muted">ক্রিয়েটিভ আইটি | ২০১৯ - ২০২১</p>
                        <p>কোম্পানির বিভিন্ন ক্লায়েন্টের জন্য ওয়েবসাইট ডেভেলপমেন্ট এবং মেইনটেনেন্সের কাজ করেছি।</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h5>ইন্টার্ন</h5>
                        <p class="text-muted">ডিজিটাল বাংলাদেশ | ২০১৮ - ২০১৯</p>
                        <p>ওয়েব ডেভেলপমেন্টের বেসিক শিখেছি এবং ছোট ছোট প্রজেক্টে কাজ করার সুযোগ পেয়েছি।</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <h3 class="mb-4">শিক্ষা</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <h5>কম্পিউটার সায়েন্সে মাস্টার্স</h5>
                        <p class="text-muted">ঢাকা বিশ্ববিদ্যালয় | ২০১৭ - ২০১৯</p>
                        <p>স্পেশালাইজেশন: ওয়েব টেকনোলজি এবং সফটওয়্যার ইঞ্জিনিয়ারিং</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h5>কম্পিউটার সায়েন্সে ব্যাচেলর</h5>
                        <p class="text-muted">ঢাকা বিশ্ববিদ্যালয় | ২০১৩ - ২০১৭</p>
                        <p>প্রধান বিষয়: সফটওয়্যার ডেভেলপমেন্ট এবং ডেটাবেস ম্যানেজমেন্ট</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h5>উচ্চ মাধ্যমিক</h5>
                        <p class="text-muted">নটর ডেম কলেজ | ২০১০ - ২০১২</p>
                        <p>বিজ্ঞান বিভাগ থেকে এইচএসসি পাস করেছি।</p>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="my-5">
    </div>
    @endsection