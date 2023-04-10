@extends('layouts.app')

@section('content')
    <title>مجله اینترنتی بارجیل درباره آجیل و خشکبار بیشتر بدانید | بارجیل</title>
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

                @foreach($blogs as $blog)
                    @if($blog->status == 1)
                        <div class="col-xl-3 col-12 mt-3">
                            <div class="blogs shadow position-relative">
                                <div>
                                    <div class="position-relative">
                                        <a href="{{ route('pages.blog', $blog->id) }}">
                                            <img src="{{ asset('image/blog').'/'.$blog->image }}" alt="" class="blogs-image img-fluid">
                                            <div class="loading-blog everything-center">
                                                <div class="dot-loader"></div>
                                                <div class="dot-loader"></div>
                                                <div class="dot-loader"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <a href="#" class="btn-category"><span>وبلاگ سلامتی</span></a>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <a href="{{ route('pages.blog', $blog->id) }}" class="blog-title"><h6 class="text-center mt-3">{{ $blog->title }}</h6></a>
                                    </div>
                                    <div class="text-center">
                                        <span class="silver">توسط</span>
                                        <span><i class="fa fa-comment-alt mt-3 share"></i></span>
                                        <span><i class="fa fa-share-alt mt-3 share"></i></span>
                                    </div>
                                    <div class="text-center px-4 mt-4 silver cart-text">
                                        {!! Str::limit($blog->description, '150') !!}
                                    </div>
                                    <div class="text-center mt-4">
                                        <a href="{{ route('pages.blog', $blog->id) }}" class="read-more">ادامه مطلب ...</a>
                                    </div>
                                </div>
                               <span class="date">{!! jdate($blog->created_at)->format('%d %B') !!}</span>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
