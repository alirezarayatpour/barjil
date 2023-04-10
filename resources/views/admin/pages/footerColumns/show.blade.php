@extends('admin.layouts.app')
@section('title', 'ستون‌های Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $footerColumns->column }}</h5>
                    <p class="card-text">{{ $footerColumns->title }}</p>
                    <div class="d-flex">
                        <form action="{{ route('footerColumns.destroy', $footerColumns->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('footerColumns.edit', $footerColumns->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
