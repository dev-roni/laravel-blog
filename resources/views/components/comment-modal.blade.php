
@props(['content_id'])
<!-- Comments Modal -->
<div class="modal fade" id="commentsModal{{ $content_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">কমেন্টস</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="commentsContainer">
                <!-- Comments will be loaded here -->
            </div>
            <div class="modal-footer">
                @auth
                <form id="commentForm" class="w-100">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" id="postId" name="post_id">
                        <textarea class="form-control" name="content" placeholder="আপনার মন্তব্য লিখুন..." rows="2"></textarea>
                        <button type="submit" class="btn btn-primary">পোস্ট</button>
                    </div>
                </form>
                @else
                <div class="alert alert-info w-100">
                    কমেন্ট করতে <a href="{{ route('login_view') }}">লগইন</a> করুন
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function showComments(content_id) {
    $('#postId').val(content_id);
    
    // Load comments via AJAX
    $.get(`/posts/${content_id}/comments`, function(data) {
        $('#commentsContainer').html(data);
        $('#commentsModal').modal('show');
    });
}

// Submit comment form
$('#commentForm').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        url: '/comments',
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            showComments($('#postId').val());
            $('#commentForm textarea').val('');
        },
        error: function(xhr) {
            alert('কমেন্ট পোস্ট করতে সমস্যা হয়েছে।');
        }
    });
});
</script>
@endpush