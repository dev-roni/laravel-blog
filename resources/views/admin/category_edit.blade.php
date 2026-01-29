@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Category</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('category_update',$category_data->id)}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="category_name">Category Name:</label>
            <input type="text"  name="category_name" class="form-control" value="{{ old('category_name', $category_data->category_name) }}" required>
              @error('category_name')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
        </div>
        <div class="form-group mb-3">
            <label for="category_name">Category description:</label>
            <input type="text" name="category_description" class="form-control" value="{{ old('category_description', $category_data->category_description) }}" required>
              @error('category_description')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
        </div>
        <div class="form-group mb-3">
            <label for="category_name">Slug:</label>
            <input type="text" name="category_slug" class="form-control" value="{{ old('category_slug', $category_data->category_slug) }}" required>
             @error('category_slug')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('category_manage') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
