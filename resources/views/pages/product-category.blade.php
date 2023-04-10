@extends('layouts.app')

@section('content')
    <title> خرید {{ $category->category }} با بهترین کیفیت و تنوع بی‌نظیر و ارسال رایگان | بارجیل </title>
    @include('layouts.header')
    <style>
        body {
            background-color: white;
        }
    </style>
    <div class="container-fluid p-5"
         style="background: url({{ asset('frontend/img/back-image.jpg') }}) no-repeat center/cover;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center text-white">{{ $category->category }}</h1>
                    <a href="javascript:void(0)" class="more-category">دسته‌بندی‌ها<i class="fas fa-angle-down angle me-2"></i></a>
                    <div class="row product-row-respon">
                        <ul class="product-row">
                            @foreach($paras as $parameter)
                                    <li>
                                        <a href="{{ route('pages.product-category', $parameter->id) }}" class="count-product">
                                            <span class="category-name">{{ $parameter->category }}</span>
    {{--                                        <span class="category-count"></span>--}}
                                        </a>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-3">

                    @include('layouts.filter')

                </div>

                <div class="col-xl-9 mt-xl-0 mt-lg-0 mt-md-0 mt-5">
                    <div class="row filters">

                        @foreach($products as $product)
                            @if($product->category_id == $category->id)
                                <div
                                    class="col-xl-3 col-6 position-relative all-product @if($product->sale) onsale @endif @if($product->exist) exist @endif">
                                    <div class="text-center">
                                        <a href="{{ route('pages.product', $product->id) }}">
                                            <img src="{{ asset('image/cover_1').'/'.$product->cover_1 }}" alt="" class="related-image img-fluid">
                                        </a>
                                        <h6 class="me-2">{{ $product->title }}</h6>
                                        @if($product->category_id == $category->id)
                                            <a href="{{ route('pages.product-category', $category->id) }}" class="swiper-para">{{ $category->category }}</a>
                                        @endif
                                        <p class="swiper-price mt-2">{{ number_format($product->price) }} تومان</p>
                                    </div>
                                    @if($product->sale)
                                        <span class="discount">{{ $product->sale }}%</span>
                                    @endif
                                    @if($product->exist == 0)
                                        <span class="is-exist">اتمام موجودی</span>
                                    @endif
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

                <div class="back-close"></div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
