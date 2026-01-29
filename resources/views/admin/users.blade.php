@extends('admin.layout')
@section('content')
<!-- পেজ হেডার এবং নতুন ব্যবহারকারী বাটন -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3><i class="bi bi-people me-2"></i> ব্যবহারকারী ম্যানেজমেন্ট</h3>
            <a href="add-user.html" class="btn" style="background-color: var(--primary-dark); color: white;">
                <i class="bi bi-plus-circle me-2"></i>নতুন ব্যবহারকারী
            </a>
        </div>

        <!-- ফিল্টার সেকশন -->
        <div class="filter_section">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <form action="{{ route('user_search') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search_user" class="form-control" placeholder="ব্যবহারকারী খুঁজুন...">
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
                                <option value="{{ route('users') }}" selected>সব রোল</option>
                                <option value="{{ route('user_role_search','admin') }}">এডমিন</option>
                                <option value="{{ route('user_role_search','editor') }}">লেখক</option>
                                <option value="{{ route('user_role_search','user') }}">সাধারণ ব্যবহারকারী</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select">
                                <option selected>সব স্ট্যাটাস</option>
                                <option>এক্টিভ</option>
                                <option>নিষ্ক্রিয়</option>
                                <option>ব্লকড</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ব্যবহারকারী টেবিল -->
        <div class="user-table">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">id</th>
                            <th width="20%">ব্যবহারকারী</th>
                            <th width="15%">রোল</th>
                            <th width="20%">ইমেইল</th>
                            <th width="15%">জয়েন তারিখ</th>
                            <th width="10%">স্ট্যাটাস</th>
                            <th width="15%">একশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user_data as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/feature-1.jpg" class="user-avatar me-2" alt="User">
                                    <div>
                                        <div class="fw-bold">{{$user->name}}</div>
                                    </div>
                                </div>
                            </td>
                            @if($user->role_name == 'admin')
                            <td><span class="badge badge-admin ">Admin</span></td>
                            @elseif($user->role_name == 'user')
                            <td><span class="badge badge-user ">User</span></td>
                            @elseif($user->role_name == 'editor')
                            <td><span class="badge badge-author">Editor</span></td>
                            @else
                            <td class="">No role</td>
                            @endif
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td><span class="badge bg-success">এক্টিভ</span></td>
                            <td>
                                <a href="{{route('user_edit_view',$user->id)}}" class="btn btn-sm btn-edit btn-action">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <!-- Trigger Delete Button -->
                                <a href="#" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal{{ $user->id }}" 
                                class="btn btn-sm btn-delete btn-action">
                                <i class="bi bi-trash"></i>
                                </a>

                            </td>
                        </tr>

                       <x-delete-modal :content_type="'user'" :content_id="$user->id" />

                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- পেজিনেশন -->
            <nav aria-label="Page navigation" class="p-3">
              {{ $user_data->onEachSide(5)->links() }}
            </nav>
        </div>
        @endsection