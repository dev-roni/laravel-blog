@extends('admin.layout')
@section('content')

        <!-- পেজ হেডার এবং নতুন পোস্ট বাটন -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3> {{$title}} </h3>
            <a href="{{ route('post_create_view') }}" class="btn" style="background-color: var(--primary-dark); color: white;">
                <i class="bi bi-plus-circle me-2"></i>নতুন পোস্ট তৈরি করুন
            </a>
        </div>

        <!-- সার্চ এবং ফিল্টার সেকশন -->
        <div class="filter_section mb-4 ">
            <div class="row ">
                <div class="col-md-6 mb-3 mb-md-0">
                    <form action="{{ route('post_search') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search_text" class="form-control" placeholder="পোস্ট খুঁজুন...">
                            <button class="btn btn-outline-secondary" type="submit" name="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-2 mb-md-0">
                          <select class="form-select" onchange="redirectTooption(this)">
                                <option value="" selected>সব ক্যাটাগরি</option>
                                @foreach($categories as $category)
                                    <option value="{{ route('category_search', $category->id) }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-6">
                            <select class="form-select" onchange="redirectTooption(this)">
                                <option selected value="{{ route('status_search','all_post') }}">সব স্ট্যাটাস</option>
                                <option value="{{ route('status_search','publish') }}">প্রকাশিত</option>
                                <option value="{{ route('status_search','draft') }}">খসড়া</option>
                                <option value="{{ route('status_search','archive') }}">আর্কাইভড</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- পোস্ট টেবিল -->
        <div class="post-table">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="30%">শিরোনাম</th>
                            <th width="15%">লেখক</th>
                            <th width="15%">ক্যাটাগরি</th>
                            <th width="10%">স্ট্যাটাস</th>
                            <th width="15%">তারিখ</th>
                            <th width="10%">একশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post_data as $postdata)
                        <tr>
                            <td>{{$postdata->id}}</td>
                            <td>{{$postdata->post_title}}</td>
                            <td>{{$postdata->author}}</td>
                            <td>{{$postdata->category_name}}</td>
                            @if($postdata->post_status == 'published')
                            <td><span class="badge-published ">Published</span></td>
                            @elseif($postdata->post_status == 'draft')
                            <td><span class="badge-draft ">Draft</span></td>
                            @elseif($postdata->post_status == 'pending')
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="bg-success rounded-pill text-white p-2">Pending</span>
                                    <a href="{{ route('post_approve',$postdata->id) }}" class="ms-1 mt-1 btn btn-sm btn-view btn-action ">
                                        <i class="bi bi-check-circle"></i>
                                    </a>
                                </div>
                            </td>


                            @else
                            <td class="">No Status</td>
                            @endif
                            <td>{{ $postdata->created_at->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('blog_post_view',$postdata->id) }}" class="btn btn-sm btn-view btn-action" target="_blank">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('post_edit_view',$postdata->id) }}" class="btn btn-sm btn-edit btn-action" target="_blank">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                 <!-- Trigger Delete Button -->
                                <a href="#" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal{{ $postdata->id }}" 
                                class="btn btn-sm btn-delete btn-action">
                                <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                                <x-delete-modal :content_type="'post'" :content_id="$postdata->id" />
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- পেজিনেশন -->
              {{ $post_data->onEachSide(1)->links() }}
        </div>
    </div>
@endsection