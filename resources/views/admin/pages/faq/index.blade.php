@extends('admin.layouts.app')
@section('title', 'پرسش‌های متداول')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('faq.create') }}" class="btn btn-primary">ایجاد</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">توضیحات</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $faq)
                                <tr>
                                    <th scope="row">{{ $faq->id }}</th>
                                    <td>{{ $faq->title }}</td>
                                    <td>{!! Str::limit($faq->description, '100') !!}</td>

                                    @switch($faq->status)
                                        @case(0)
                                        @php
                                            $url = route('faq.status', $faq->id);
                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                        @endphp
                                        @break

                                        @case(1)
                                        @php
                                            $url = route('faq.status', $faq->id);
                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                        @endphp
                                        @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('faq.show', $faq->id) }}" class="btn btn-info">مدیریت</a></td>
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
