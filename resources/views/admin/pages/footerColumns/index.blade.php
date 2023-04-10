@extends('admin.layouts.app')
@section('title', 'ستون‌های Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('footerColumns.create') }}" class="btn btn-primary">ایجاد</a>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ستون</th>
                            <th scope="col">عنوان ستون</th>
{{--                            <th scope="col">آیتم ستون</th>--}}
{{--                            <th scope="col">لینک آیتم</th>--}}
                            <th scope="col">وضعیت</th>
                            <th scope="col">مدیریت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($footerColumns as $footerColumn)
                            <tr>
                                <th scope="row">{{ $footerColumn->id }}</th>
                                <td>{{ $footerColumn->column }}</td>
                                <td>{{ $footerColumn->title }}</td>
{{--                                <td>{{ $footerColumn->item }}</td>--}}
{{--                                <td>{{ $footerColumn->link }}</td>--}}

                                @switch($footerColumn->status)
                                    @case(0)
                                    @php
                                        $url = route('footerColumns.status', $footerColumn->id);
                                        $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                    @endphp
                                    @break

                                    @case(1)
                                    @php
                                        $url = route('footerColumns.status', $footerColumn->id);
                                        $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                    @endphp
                                    @break
                                @endswitch

                                <td>{!! $status !!}</td>
                                <td><a href="{{ route('footerColumns.show', $footerColumn->id) }}" class="btn btn-info">مدیریت</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
