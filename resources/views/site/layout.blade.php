<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>euphoria-{{$title}}</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" class='body'>
    
    <!-- নেভিগেশন বার -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-top mb-4" id="mainNavbar">
        <div class="container-fluid ">
            <a class=" navbar-brand fw-bold" href="{{ route('home') }}"><img src="{{asset('assets/img/logo.png')}}" class="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href=" {{ route('home') }} ">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('site_article')}}">ব্লগ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('site_category') }} ">ক্যাটাগরি</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site_about') }}">আমার সম্পর্কে</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site_contact') }}">যোগাযোগ</a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                        <div class="dropdown ">
                            <a class="dropdown-toggle d-flex align-items-center text-decoration-none comment-author nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person me-2"></i><span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route('profile',Auth::user()->id)}}">প্রোফাইল</a></li>
                                <li><a class="dropdown-item" href="#">পছন্দের ব্লগ</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="bi bi-box-arrow-right me-2"></i> লগ আউট
                                    </a>
                                </li>
                            </ul>
                        </div>   
                        @else
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-2"></i> লগ ইন
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
@yield('content')

     <!-- ফুটার -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>আমার ব্লগ</h5>
                    <p>প্রযুক্তি, ভ্রমণ এবং জীবনযাপন নিয়ে আমার চিন্তাভাবনা শেয়ার করার একটি প্ল্যাটফর্ম।</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>লিংক</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class=" text-decoration-none">হোম</a></li>
                        <li><a href="blog.html" class=" text-decoration-none">ব্লগ</a></li>
                        <li><a href="categories.html" class=" text-decoration-none">ক্যাটাগরি</a></li>
                        <li><a href="about.html" class=" text-decoration-none">আমার সম্পর্কে</a></li>
                        <li><a href="contact.html" class=" text-decoration-none">যোগাযোগ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>সোশ্যাল মিডিয়া</h5>
                    <a href="#" class="btn btn-outline-dark me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-outline-dark me-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="btn btn-outline-dark me-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-outline-dark"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <p class="mb-0 text-center">&copy; ২০২৩ আমার ব্লগ। সকল স্বত্ব সংরক্ষিত।</p>
        </div>
    </footer>
     @if(session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="flash-message">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('flash-message').style.display = 'none';
        }, 2000);
    </script>
    @endif

    <!-- Flash failed Message (Positioned at top-right) -->
    @if(session('falied'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="flash-message">
            <i class="bi bi-check-circle me-2"></i> {{ session('falied') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('flash-message').style.display = 'none';
        }, 2000);
    </script>
    @endif
    
    <!-- Bootstrap JS Bundle with Popper -->
     @stack('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{asset('assets/js/blog_site.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
