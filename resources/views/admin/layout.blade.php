<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-{{$title}}</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/admin_style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- TinyMCE Editor -->
    <script src="https://cdn.tiny.cloud/1/qgbm7ue82ee8f4x2mct68srdxbyvh2sw3tmtv143ol123e9y/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
   
<body class='body'>
    <!-- সাইডবার -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="bi bi-journal-bookmark-fill"></i> ব্লগ এডমিন</h3>
        </div>
        <ul class="sidebar-menu">
            @if(Auth::check() and Auth::user()->user_role==1)
            <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class=" bi bi-speedometer2"></i> ড্যাশবোর্ড</a>
            </li>
            @endif
            @if(Auth::check() and (Auth::user()->user_role==2 or Auth::user()->user_role==1) )
            <li class="{{ Route::is('post_management','post_create_view','blog_post_view','post_edit_view') ? 'active' : '' }}">
                <a href="{{ route('post_management') }}"><i class="bi bi-file-earmark-text"></i> পোস্ট ম্যানেজমেন্ট</a>
            </li>

            <li class="{{ Route::is('category_manage','category_create_view','search_category','category_edit_view') ? 'active' : '' }}">
                <a href="{{ route('category_manage') }}"><i class="bi bi-grid"></i> ক্যাটাগরি</a>
            </li>

             <li class="{{ Route::is('comments') ? 'active' : '' }}">
                <a href="{{ route('comments') }}"><i class="bi bi-chat-left-text"></i> কমেন্টস</a>
            </li>
            <li class="{{ Route::is('carosel.index') ? 'active' : '' }}">
                <a href="{{ route('carosel.index') }}"><i class="bi bi-chat-left-text"></i> কেরোসেল</a>
            </li>
            @endif
            @if(Auth::check() and Auth::user()->user_role==1)
            <li class="{{ Route::is('users') ? 'active' : '' }}">
                <a href="{{ route('users') }}"><i class="bi bi-people"></i> ব্যবহারকারী</a>
            </li>

            <li class="{{ Route::is('settings') ? 'active' : '' }}">
                <a href="{{ route('settings') }}"><i class="bi bi-gear"></i> সেটিংস</a>
            </li>
            @endif
            <li>
                @if(Auth::check())
                <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> লগ আউট</a>
                @else
                <a href="{{ route('login') }}"><i class="bi bi-box-arrow-right"></i> লগ ইন</a>
                @endif
            </li>
        </ul>
    </div>

    <!-- মেইন কন্টেন্ট -->
    <div class="main-content ">
        <!-- টপ নেভবার -->
        <div class="top-navbar d-flex justify-content-between align-items-center ">
            <button class="btn" id="sidebarCollapse">
                <i class="bi bi-list"></i>
            </button>
            <div class="d-flex align-items-center">
                <!-- মেইন সাইট ভিউ বাটন -->
                <a href="{{route('home')}}" class=" me-3 text-decoration-none comment-author" target="_blank"> 
                    <i class="bi bi-pass"></i> ব্লগ সাইট ভিজিট
                </a> 
            </div>        
        
            
            <!-- মাঝখানের ফাকা জায়গা -->
            <div class="flex-grow-1"></div>

            <!-- ডান পাশের আইটেম (নোটিফিকেশন + প্রোফাইল) -->
            <div class="d-flex align-items-center">
                <div class="me-3 ">
                    <i class="bi bi-bell-fill"></i>
                    
                </div>
                <div class="dropdown">
                    @if(Auth::check())
                    <a class="dropdown-toggle d-flex align-items-center text-decoration-none comment-author" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                        <img src="assets/img/feature-1.jpg" style="max-width: 150px; max-height: 40px;" class="rounded-circle me-2" alt="Profile">
                        <span>{{Auth::User()->user_role}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{route('profile',Auth::user()->id)}}"><i class="bi bi-person me-2"></i>{{Auth::user()->name}}</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> সেটিংস</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right me-2"></i> লগ আউট</a></li>
                        
                    </ul>
                    @else
                    <a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-box-arrow-right me-2"></i> লগ ইন</a>
                    @endif
                </div>
            </div>
        </div>
 @yield('content')
    </div>

    <!-- Flash success Message (Positioned at top-right) -->
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
        }, 100000);
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
        }, 100000);
    </script>
    @endif

    <script>
 
    //অপশন চেঞ্জ করলেই select করার জন্য
    function redirectTooption(select) {
        const url = select.value;
        if (url) {
            window.location.href = url;
        }
    }
    </script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- কাস্টম JS -->
    <script src="{{ asset('assets/js/blog_admin.js') }}"></script>

</body>
</html>