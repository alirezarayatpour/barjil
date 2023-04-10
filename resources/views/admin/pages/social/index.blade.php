@extends('admin.layouts.app')
@section('title', 'شبکه‌های اجتماعی')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('social.create') }}" class="btn btn-primary">ایجاد</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">آیکون</th>
                                <th scope="col">لینک</th>
                                <th scope="col">رنگ</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">حذف</th>
                                <th scope="col">ویرایش</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($socials as $social)
                                <tr>
                                    <th scope="row">{{ $social->id }}</th>
                                    <td><i class="{{ $social->icon }}"></i></td>
                                    <td>{{ $social->link }}</td>
                                    <td><div style="width: auto; height: 20px; background-color: {{ $social->color }}"></div></td>

                                    @switch($social->status)
                                        @case(0)
                                        @php
                                            $url = route('social.status', $social->id);
                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                        @endphp
                                        @break

                                        @case(1)
                                        @php
                                            $url = route('social.status', $social->id);
                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                        @endphp
                                        @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td>
                                        <form action="{{ route('social.destroy', $social->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger">حذف</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('social.edit', $social->id) }}" class="btn btn-primary mr-2">ویرایش</a></td>
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
