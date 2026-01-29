@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Create New User</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user_update', $user_data->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Full Name</label>
            <input type="text" name="user_name" class="form-control" required value="{{ old('name', $user_data->name) }}">
        </div>

        <div class="mb-3">
            <label for="email">Email Address</label>
            <input type="email" name="user_email" class="form-control" required value="{{ old('email', $user_data->email) }}">
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <!-- <div class="mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div> -->

        <!-- শিরোনাম সেকশন -->
        <div class="col-md-6">
        <label for="user_role" class="form-label fw-bold">ইউজার রোল</label>
        <select class="form-select rounded-3" id="user_role" name="user_role" required>
            <option value="{{ $user_role_data->id }}" selected>{{ $user_role_data->role_name }}</option>
            @foreach($all_roles as $role)
            @if($user_role_data->role_name != $role->role_name)
                <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
            @endif
            @endforeach
        </select>
        @error('user_data')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Create User</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
