@extends('admin.layouts.app')
@section('title', 'وبلاگ')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('blog.create') }}" class="btn btn-primary">ایجاد وبلاگ جدید</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">توضیحات</th>
                                <th scope="col">عکس</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $blog->id }}</th>
                                    <td>{{ $blog->title }}</td>
                                    <td>{!! Str::limit($blog->description, '50') !!}</td>
                                    <td><img src="{{ asset('image/blog').'/'.$blog->image }}" alt="" width="100px" height="50px"></td>

                                    @switch($blog->status)
                                        @case(0)
                                        @php
                                            $url = route('blog.status', $blog->id);
                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                        @endphp
                                        @break

                                        @case(1)
                                        @php
                                            $url = route('blog.status', $blog->id);
                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                        @endphp
                                        @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('blog.show', $blog->id) }}" class="btn btn-info">مدیریت</a></td>
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
