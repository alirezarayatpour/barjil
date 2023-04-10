@extends('admin.layouts.app')
@section('title', 'بنر')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('banner.create') }}" class="btn btn-primary">ایجاد بنر</a>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">موقعیت</th>
                            <th scope="col">بنر</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">مدیریت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <th scope="row">{{ $banner->id }}</th>
                                <td>{{ $banner->position }}</td>
                                <td><img src="{{ asset('image/banner').'/'.$banner->image }}" alt="" width="100px" height="50px"></td>

                                @switch($banner->status)
                                    @case(0)
                                    @php
                                        $url = route('banner.status', $banner->id);
                                        $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                    @endphp
                                    @break

                                    @case(1)
                                    @php
                                        $url = route('banner.status', $banner->id);
                                        $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                    @endphp
                                    @break
                                @endswitch

                                <td>{!! $status !!}</td>
                                <td><a href="{{ route('banner.show', $banner->id) }}" class="btn btn-info">مدیریت</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $banners->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
