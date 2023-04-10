@extends('layouts.app')

@section('content')
    <title>مشاهده همه محصولات آجیل و خشکبار (خرید و سفارش آنلاین) | بارجیل</title>
    @include('layouts.header')
    <style>
        body {
            background-color: white;
        }
    </style>
    <div class="container-fluid p-5" style="background: url({{ asset('frontend/img/back-image.jpg') }}) no-repeat center/cover;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center text-white">فروشگاه</h1>
                    <a href="javascript:void(0)" class="more-category">دسته‌بندی‌ها<i class="fas fa-angle-down angle me-2"></i></a>
                    <div class="row product-row-respon">

                        <ul class="product-row">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('pages.product-category', $category->id) }}" class="count-product">
                                        <span class="category-name">{{ $category->category }}</span>
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
                            <div class="col-xl-3 col-6 position-relative all-product @if($product->sale) onsale @endif @if($product->exist) exist @endif">
                                <div class="text-center">
                                    <a href="{{ route('pages.product', $product->id) }}">
                                        <img src="{{ asset('image/cover_1').'/'.$product->cover_1 }}" alt="" class="related-image img-fluid">
                                    </a>
                                    <h6 class="me-2">{{ $product->title }}</h6>
                                    @foreach($parameters as $parameter)
                                        @if($product->category_id == $parameter->id)
                                            <a href="{{ route('pages.product-category', $parameter->id) }}" class="swiper-para">{{ $parameter->category }}</a>
                                        @endif
                                    @endforeach
                                    <p class="swiper-price mt-2">{{ number_format($product->price) }} تومان</p>
                                </div>
                                @if($product->sale)
                                    <span class="discount">{{ $product->sale }}%</span>
                                @endif
                                @if($product->exist == 0)
                                    <span class="is-exist">اتمام موجودی</span>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="back-close"></div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
