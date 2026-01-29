@extends('admin.layout')
@section('content')
<div class="user-table">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="5%">id</th>
                    <th width="20%">কেরোসেল</th>
                    <th width="20%">কেরোসেল সেটআপ</th>
                    <th width="15%">একশন</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carosels as $carosel)
                <tr>
                    <td>{{$carosel->id}}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="assets/img/feature-1.jpg" class="user-avatar me-2" alt="User">
                            <div>
                                <div class="fw-bold">{{$carosel->category->category_name}}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{$carosel->carosel_select}}</td>
                    <td>
                        <a href="{{route('carosel1',[$carosel->id, $carosel->carosel_select])}}" class="btn btn-sm btn-edit btn-action">
                            <i class="bi bi-1-square-fill"></i>
                        </a>
                        <a href="{{route('carosel2',[$carosel->id, $carosel->carosel_select])}}" class="btn btn-sm btn-edit btn-action">
                            <i class="bi bi-2-square-fill"></i>
                        </a>
                        <a href="{{route('carosel3',[$carosel->id, $carosel->carosel_select])}}" class="btn btn-sm btn-edit btn-action">
                            <i class="bi bi-3-square-fill"></i>
                        </a>
                        <!-- Trigger Delete Button -->
                        <form action="{{ route('carosel.destroy',$carosel->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-delete btn-action"
                                        onclick="return confirm('আপনি কি নিশ্চিত ডিলিট করতে চান?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                        </form>
                    </td>
                </tr>


                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- পেজিনেশন -->
    <nav aria-label="Page navigation" class="p-3">
        {{ $carosels->onEachSide(5)->links() }}
    </nav>
</div>
@endsection