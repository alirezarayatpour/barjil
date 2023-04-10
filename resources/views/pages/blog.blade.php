@extends('layouts.app')

@section('content')
    <title>{{ $blog->title }} | بارجیل</title>
    @include('layouts.header')

    <style>
        body {
            background-color: white;
        }
    </style>
    <div class="container-fluid" style="background: url({{ asset('frontend/img/back-image.jpg') }}) no-repeat center/cover;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1 class="text-center text-white py-5">وبلاگ</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-9 col-12">

                    <div>
                        <a href="#" class="button-category">وبلاگ سلامتی</a>
                        <h2 class="mt-4">{{ $blog->title }}</h2>
                        <p class="silver mt-2">ارسال توسط</p>
                        <div class="position-relative">
                            <img src="{{ asset('image/blog').'/'.$blog->image }}" alt="" class="img-fluid">
                           <span class="date-blog">{!! jdate($blog->created_at)->format('%d %B') !!}</span>
                        </div>
                        <div class="mt-5">{!! $blog->description !!}</div>
                    </div>
                    <br>
                    <hr style="border: 1px solid #939393;">

                    <div class="row">
{{--                        <div class="col-xl-8">--}}
{{--                            <ul class="blog-tag">--}}
{{--                                <li class="everything-center"><a href="#"><i class="bi bi-circle-fill"></i>انجیر خشک</a></li>--}}
{{--                                <li class="everything-center"><a href="#"><i class="bi bi-circle-fill"></i>انجیر خشک</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

                        <div class="col-xl-12 everything-center">
                            @foreach($socials as $social)
                                @if($social->status == 1)
                                    <a href="https://{{ $social->link }}" class="text-white">
                                        <span class="social-circle everything-center" style="background-color: {{ $social->color }}">
                                            <i class="{{ $social->icon }}"></i>
                                        </span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-xl-5 col-4 blog-next-previous">
                            @if($next)
                                <a href="{{ URL::to('blog/'.$next) }}">
                                    <i class="fas fa-chevron-circle-right"></i>
                                    جدیدتر
                                </a>
                            @endif
                        </div>

                        <div class="col-xl-2 col-4 text-center">
                            <a href="{{ route('pages.blogs') }}">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABeklEQVRIie3WvU4bQRQF4G9jsJQ3oEMKdFgJQlHalKmwBBIvQBLlHVIGeIR0+WmoAg1CSJTwABhhmQaJlKlpcaw4xazN7iLvjgusiPhIK83M7plzZ+7OucP/hiTTruEdVio4PRzjMO038QYzFbwzfMEfeJJ58R6fIoJ9ij28xCv8SMeqsC0sjEKUyzjAh4hJXrjbmUtsRnCSDCcnnKAfMYH0uyTTHpeT2+qJYio8FZ6IcA/1SF4dv9NnHE5v0Mla5ir20VF+Nut4hucpv41rdEs4CRpYx1FRmGCDMV59gp9pfwGvlXt1Hy3Br3E/x8VARiEZ0S77PikODNAUDL9TMcksFuW3+komfyPQwIa7qjbEZ3yrIA/QFgrDW1xEcr6nGsjnZUb4S2PQFVZuTM5Q7584x1PhqfCDCefuRBVIhGvquJxhDcie43NsZYIYhbrgQi0h8CXBHKqKxBo+DgZqBeEbzClfxS12cIpfgnPNK09bH7v4Kv5W+sjwF9f8Q8to9n6yAAAAAElFTkSuQmCC">
                            </a>
                        </div>

                        <div class="col-xl-5 col-4 text-start blog-next-previous">
                            @if ($previous)
                                <a href="{{ URL::to('blog/'.$previous) }}">
                                    قدیمی‌تر
                                    <i class="fas fa-chevron-circle-left"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    <hr style="border: 1px solid #939393;">

                    <div class="row mt-5">
                        <div class="col-xl-12">
                            {{-- <h5>دیدگاهتان را بنویسید</h5>
                            <p class="silver">برای نوشتن دیدگاه باید <a href="{{ route('pages.my-account') }}">وارد شوید.</a></p> --}}
                        </div>
                    </div>

                </div>

                <div class="col-xl-3">
                    <div class="border-last-notes">
                        <h6 class="filter-exist">آخرین نوشته‌ها</h6>
                        <ul class="range-orange-box">
                            @foreach($blogs as $blog)
                                <li class="product-category-item mb-3">
                                    <a href="{{ route('pages.blog', $blog->id) }}">
                                        <img src="{{ asset('image/blog').'/'.$blog->image }}" alt="{{ $blog->title }}"
                                             width="50px" height="50px" >
                                        <div>{!! $blog->title !!}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
