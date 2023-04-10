@extends('admin.layouts.app')
@section('title', 'مدیریت نظرات')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

{{--            <a href="{{ route('comment.create') }}" class="btn btn-primary">ایجاد وبلاگ جدید</a>--}}

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">خلاصه نظر</th>
                                <th scope="col">امتیاز کاربر</th>
                                <th scope="col">نویسنده</th>
                                <th scope="col">نام محصول</th>
                                <th scope="col">ایجاد شده در تاریخ</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">حذف</th>
                                <th scope="col">نمایش کامل</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <th scope="row">{{ $comment->id }}</th>
                                    <td>{!! Str::limit($comment->comment, '50') !!}</td>
                                    <td>{{ $comment->rating }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->product->title }}</td>
                                    <td>{!! jdate($comment->created_at)->format('%d %B %Y') !!}</td>

                                    @switch($comment->status)
                                        @case(0)
                                        @php
                                            $url = route('comment.status', $comment->id);
                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                        @endphp
                                        @break

                                        @case(1)
                                        @php
                                            $url = route('comment.status', $comment->id);
                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                        @endphp
                                        @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td>
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger">حذف</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('comment.show', $comment->id) }}" class="btn btn-primary">مشاهده</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
