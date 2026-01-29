@props(['post','post_id'])

<div class="modal fade" id="commentsModal{{$post_id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">কমেন্টস</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="commentsContainer">
                <h2>{{ $post->post_title }}</h2>
                <p>{{ $post->content}}</p>

                <hr>
                
                <h4>মন্তব্যসমূহ:</h4>
                @foreach($post->comments as $comment)
                    <div class="mb-3 border p-2 rounded">
                        <strong>{{ $comment->user->name ?? 'অতিথি' }}</strong><br>
                        {{ $comment->content }}
                    </div>
                @endforeach

                
                <form action="{{ route('comment.store',$post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-3">
                        <textarea name="content" class="form-control" placeholder="আপনার মন্তব্য লিখুন..." rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">মন্তব্য পোস্ট করুন</button>
                </form>
               
            </div>
        </div>
    </div>
</div>
