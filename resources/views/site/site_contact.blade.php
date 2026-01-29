 @extends('site.layout')
 @section('content')
 <!-- Contact হেডার -->
    <header class="blog-header text-center ">
        <div class="container">
            <h1 class="display-4 fw-bold">যোগাযোগ করুন</h1>
            <p class="lead">আপনার কোন প্রশ্ন বা মতামত থাকলে আমাদের জানান</p>
        </div>
    </header>

    <!-- যোগাযোগ তথ্য -->
    <div class="container mb-5">
        <div class="row">
            <!-- যোগাযোগ কার্ড ১ -->
            <div class="col-md-4">
                <div class="card contact-card text-center p-4">
                    <div class="contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h4>ঠিকানা</h4>
                    <p>১২৩/বি, মেইন রোড<br>ধানমন্ডি, ঢাকা-১২০৫<br>বাংলাদেশ</p>
                </div>
            </div>
            
            <!-- যোগাযোগ কার্ড ২ -->
            <div class="col-md-4">
                <div class="card contact-card text-center p-4">
                    <div class="contact-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h4>ফোন</h4>
                    <p>+৮৮০ ১৭XX XXX XXX<br>+৮৮০ ১৯XX XXX XXX</p>
                    <p>শনি-বৃহস্পতি: সকাল ৯টা - সন্ধ্যা ৬টা</p>
                </div>
            </div>
            
            <!-- যোগাযোগ কার্ড ৩ -->
            <div class="col-md-4">
                <div class="card contact-card text-center p-4">
                    <div class="contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h4>ইমেইল</h4>
                    <p>info@amarblog.com<br>support@amarblog.com</p>
                    <p>আমরা ২৪ ঘন্টার মধ্যে রিপ্লাই দেব</p>
                </div>
            </div>
        </div>
    </div>

    <!-- যোগাযোগ ফর্ম এবং ম্যাপ -->
    <div class="container">
        <div class="row">
            <!-- যোগাযোগ ফর্ম -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="contact-form">
                    <h3 class="mb-4">মেসেজ পাঠান</h3>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">আপনার নাম</label>
                            <input type="text" class="form-control" id="name" placeholder="আপনার পুরো নাম লিখুন" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">ইমেইল ঠিকানা</label>
                            <input type="email" class="form-control" id="email" placeholder="আপনার ইমেইল লিখুন" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">বিষয়</label>
                            <input type="text" class="form-control" id="subject" placeholder="মেসেজের বিষয় লিখুন" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">আপনার মেসেজ</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="আপনার মেসেজ লিখুন..." required></textarea>
                        </div>
                        <button type="submit" class="btn outline">মেসেজ পাঠান</button>
                    </form>
                </div>
            </div>
            
            <!-- গুগল ম্যাপ -->
            <div class="col-lg-6">
                <h3 class="mb-4">আমাদের অবস্থান</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.8625569899997!2d90.3782773154315!3d23.750858084587522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b33cffc3fb%3A0x4a826f475fd312af!2sDhaka%201205!5e0!3m2!1sen!2sbd!4v1620000000000!5m2!1sen!2sbd" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endsection