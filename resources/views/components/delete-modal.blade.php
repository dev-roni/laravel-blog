@props(['content_type', 'content_id'])
@php
    switch ($content_type) {
        case 'post':
            $route_name = route('post_delete', $content_id);
            $message = 'এই পোস্টটি ডিলিট করতে চান?';
            break;
        case 'category':
            $route_name = route('category_delete', $content_id);
            $message = 'এই ক্যাটাগরিটি ডিলিট করতে চান?';
            break;
        case 'user':
            $route_name = route('user_delete', $content_id);
            $message = 'এই ইউজারকে ডিলিট করতে চান?';
            break;
        default:
            $route_name = '#';
            $message = 'আপনি কি এটি ডিলিট করতে চান?';
    }
@endphp

<div class="modal fade" id="deleteModal{{ $content_id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $content_id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="deleteModalLabel{{ $content_id }}">ডিলিট কনফার্ম করুন</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 2rem;"></i>
        <p class="mt-3 mb-0">{{ $message }}</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
        <a href="{{ $route_name }}" class="btn btn-danger">হ্যাঁ, ডিলিট করুন</a>
      </div>
    </div>
  </div>
</div>
