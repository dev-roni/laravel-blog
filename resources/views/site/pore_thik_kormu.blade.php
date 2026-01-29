<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->post_title }} - My Blog</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .post-header-image {
            height: 450px;
            object-fit: cover;
            width: 100%;
        }
        .author-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }
        .comment-img {
            width: 40px;
            height: 40px;
        }
        .like-btn.active {
            color: #dc3545;
        }
        .post-content img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Post Content -->
            <div class="col-lg-8">
                <article>
                    <!-- Post Header -->
                    <header class="mb-5">
                        <h1 class="fw-bold mb-3">{{ $post_data->post_title }}</h1>
                        
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ $post->author->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($post->author->name) }}" 
                                 alt="{{ $post->author->name }}" class="author-img rounded-circle me-3">
                            <div>
                                <p class="mb-0 fw-bold">{{ $post_data->author}}</p>
                                <small class="text-muted">
                                    Published {{ $post_data->created_at->diffForHumans() }} 
                                    · {{ $post_data->reading_time }} min read
                                </small>
                            </div>
                        </div>
                        
                        <img src="{{ $post->featured_image }}" alt="{{ $post->post_title }}" class="post-header-image rounded mb-4">
                        
                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <span class="badge bg-secondary">{{ $post_data->category}}</span>


                                 <!-- @foreach($post_data->tags as $tag)
                                    <span class="badge bg-light text-dark">{{ $tag->name }}</span>
                                @endforeach  -->
                            </div>
                            <!-- <div>
                                <button class="btn btn-sm btn-outline-secondary me-2 like-btn" data-post-id="{{ $post->id }}">
                                    <i class="far fa-heart"></i> 
                                    <span class="like-count">{{ $post_data->likes_count }}</span>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#shareModal">
                                    <i class="fas fa-share-alt"></i> Share
                                </button>
                            </div> -->
                        </div>
                    </header>
                    
                    <!-- Post Content -->
                    <div class="post-content mb-5">
                        {!! $post_data->content !!}
                    </div>
                    
                    <!-- Post Footer -->
                    <footer class="border-top py-4 mb-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <!--  <div>
                                <button class="btn btn-sm btn-outline-primary me-2 like-btn" data-post-id="{{ $post->id }}">
                                    <i class="far fa-heart"></i> 
                                    <span class="like-count">{{ $post_data->likes_count }}</span> Likes
                                </button>
                                <a href="#comments" class="btn btn-sm btn-outline-secondary">
                                    <i class="far fa-comment"></i> {{ $post_data->comments_count }} Comments
                                </a>
                            </div> -->
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="postActions" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    @auth
                                        @if(auth()->id() == $post_data->author_id)
                                            <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit Post</a></li>
                                            <li>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete Post</button>
                                                </form>
                                            </li>
                                        @endif
                                    @endauth
                                    <li><a class="dropdown-item" href="#">Report</a></li>
                                    <li><a class="dropdown-item" href="#">Save</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </footer>
                    
                    <!-- Author Bio -->
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="d-flex">
                                <img src="{{ $post->author->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($post->author->name) }}" 
                                     alt="{{ $post->author->name }}" class="author-img rounded-circle me-4">
                                <div>
                                    <h5 class="card-title">{{ $post_data->author->name }}</h5>
                                    <p class="card-text">{{ $post_data->author->bio ?? 'No bio available' }}</p>
                                    <div class="social-links">
                                        @if($post->author->twitter)
                                            <a href="{{ $post->author->twitter }}" class="text-decoration-none me-2">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        @endif
                                        @if($post->author->facebook)
                                            <a href="{{ $post->author->facebook }}" class="text-decoration-none me-2">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if($post->author->website)
                                            <a href="{{ $post->author->website }}" class="text-decoration-none me-2">
                                                <i class="fas fa-globe"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comments Section -->
                    <section id="comments" class="mb-5">
                        <h4 class="mb-4">
                            <i class="far fa-comments me-2"></i>Comments ({{ $post->comments_count }})
                        </h4>
                        
                        @auth
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <textarea name="content" class="form-control" rows="3" 
                                                  placeholder="Write your comment here..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-info">
                            Please <a href="{{ route('login') }}">login</a> to post a comment.
                        </div>
                        @endauth
                        
                        <div class="comments-list">
                            @foreach($post->comments as $comment)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <img src="{{ $comment->user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($comment->user->name) }}" 
                                                 alt="{{ $comment->user->name }}" class="comment-img rounded-circle me-3">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="card-subtitle mb-1">{{ $comment->user->name }}</h6>
                                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                </div>
                                                <p class="card-text">{{ $comment->content }}</p>
                                                
                                                <div class="d-flex">
                                                    <button class="btn btn-sm btn-outline-secondary me-2 comment-like-btn" 
                                                            data-comment-id="{{ $comment->id }}">
                                                        <i class="far fa-thumbs-up"></i> {{ $comment->likes_count }}
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-secondary reply-btn" 
                                                            data-comment-id="{{ $comment->id }}">
                                                        Reply
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </article>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px;">
                    <!-- Related Posts -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Related Posts
                        </div>
                        <div class="card-body">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="mb-3">
                                    <h6><a href="{{ route('posts.show', $relatedPost->id) }}" class="text-decoration-none">{{ $relatedPost->post_title }}</a></h6>
                                    <small class="text-muted">{{ $relatedPost->created_at->diffForHumans() }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Categories
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($categories as $category)
                                    <a href="{{ route('categories.show', $category->slug) }}" 
                                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        {{ $category->name }}
                                        <span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Popular Tags -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Popular Tags
                        </div>
                        <div class="card-body">
                            @foreach($popularTags as $tag)
                                <a href="{{ route('tags.show', $tag->slug) }}" 
                                   class="btn btn-sm btn-outline-secondary mb-2 me-1">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share this post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-around mb-4">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="#" class="btn btn-outline-info">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="#" class="btn btn-outline-danger">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ url()->current() }}" id="shareUrl">
                        <button class="btn btn-outline-secondary" onclick="copyShareUrl()">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>My Blog</h5>
                    <p>A place to share knowledge and better understand the world.</p>
                </div>
                <div class="col-md-2 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white">Home</a></li>
                        <li><a href="/about" class="text-white">About</a></li>
                        <li><a href="/contact" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-3">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        @foreach($categories->take(5) as $category)
                            <li><a href="{{ route('categories.show', $category->slug) }}" class="text-white">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Subscribe</h5>
                    <form>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Your email">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                    <div class="social-icons">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} My Blog. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Like post functionality
        $('.like-btn').click(function() {
            const postId = $(this).data('post-id');
            const likeBtn = $(this);
            
            $.ajax({
                url: '/posts/' + postId + '/like',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.action === 'liked') {
                        likeBtn.find('i').removeClass('far').addClass('fas');
                        likeBtn.addClass('active');
                    } else {
                        likeBtn.find('i').removeClass('fas').addClass('far');
                        likeBtn.removeClass('active');
                    }
                    likeBtn.find('.like-count').text(response.likes_count);
                }
            });
        });
        
        // Copy share URL
        function copyShareUrl() {
            const copyText = document.getElementById("shareUrl");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("Copied the URL: " + copyText.value);
        }
        
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>