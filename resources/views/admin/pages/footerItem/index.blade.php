@extends('admin.layouts.app')
@section('title', 'آیتم‌های Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('footerItem.create') }}" class="btn btn-primary">ایجاد</a>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ستون</th>
                            <th scope="col">آیتم ستون</th>
                            <th scope="col">لینک آیتم</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">مدیریت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($footerItems as $footerItem)
                            <tr>
                                <th scope="row">{{ $footerItem->id }}</th>
                                <td>{{ $footerItem->column }}</td>
                                <td>{{ $footerItem->item }}</td>
                                <td>{{ $footerItem->link }}</td>

                                @switch($footerItem->status)
                                    @case(0)
                                    @php
                                        $url = route('footerItem.status', $footerItem->id);
                                        $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                    @endphp
                                    @break

                                    @case(1)
                                    @php
                                        $url = route('footerItem.status', $footerItem->id);
                                        $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                    @endphp
                                    @break
                                @endswitch

                                <td>{!! $status !!}</td>
                                <td><a href="{{ route('footerItem.show', $footerItem->id) }}" class="btn btn-info">مدیریت</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
