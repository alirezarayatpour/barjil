@extends('admin.layouts.app')
@section('title', 'نظرات')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-2">نویسنده: {{ $comment->user->name }}</h5>
                    <p class="card-text mt-3">تاریخ ایجاد: {!! jdate($comment->created_at)->format('%d %B %Y') !!}</p>
                    <p class="card-text mt-2">امتیاز: {{ $comment->rating }}</p>
                    <h4>نظر:</h4>
                    <p class="card-text">{!! $comment->comment !!}</p>
                    <div class="d-flex">
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
