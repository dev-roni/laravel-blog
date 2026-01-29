 //স্ক্রল ইভেন্টে ন্যাভবার রং পরিবর্তন 
window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 100) {
            navbar.classList.remove('navbar-top');
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.add('navbar-top');
            navbar.classList.remove('scrolled');
        }
    });

