@extends('layouts.app')

@section('content')
    <title>فروشگاه آنلاین آجیل و خشکبار (بیش از 600 محصول متنوع) | بارجیل</title>
    @include('layouts.header')
    {{-- ! Banner --}}
    <div class="container-fluid mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($banners as $banner)
                        @if ($banner->position == 'ردیف اول سمت راست' and $banner->status == 1)
                            <a href="{{ route('pages.product-category', $banner->category_id) }}">
                                <img src="{{ asset('image/banner') . '/' . $banner->image }}" alt="بنر اصلی"
                                    class="img-fluid w-100 h-100">
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($banners as $banner)
                                @if ($banner->position == 'ردیف اول سمت چپ بالا' and $banner->status == 1)
                                    <a href="{{ route('pages.product-category', $banner->category_id) }}">
                                        <img src="{{ asset('image/banner') . '/' . $banner->image }}" alt=""
                                            class="img-fluid w-100">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-12 mt-4">
                            @foreach ($banners as $banner)
                                @if ($banner->position == 'ردیف اول سمت چپ پایین' and $banner->status == 1)
                                    <a href="{{ route('pages.product-category', $banner->category_id) }}">
                                        <img src="{{ asset('image/banner') . '/' . $banner->image }}" alt=""
                                            class="img-fluid w-100 h-100">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ! Banner --}}

    {{-- ! Support --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-between"><span>بارجیل، فروشگاه آنلاین آجیل و خشکبار باکیفیت و دست‌چین</span></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 shadow-lg p-2 text-center radius-support">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div>
                                    <img src="{{ asset('frontend/img/پشتیبانی-1.png') }}" alt=""
                                        class="support-image">
                                    <h6>پشتیبانی کامل</h6>
                                    <p class="swiper-para">هر لحظه كه نياز داشته باشيد از ابتداي خريد تا زمان تحويل تيم
                                        بارجيل در كنار شما هستند</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div>
                                    <img src="{{ asset('frontend/img/پشتیبانی-1.png') }}" alt=""
                                        class="support-image">
                                    <h6>پشتیبانی کامل</h6>
                                    <p class="swiper-para">هر لحظه كه نياز داشته باشيد از ابتداي خريد تا زمان تحويل تيم
                                        بارجيل در كنار شما هستند</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div>
                                    <img src="{{ asset('frontend/img/پشتیبانی-1.png') }}" alt=""
                                        class="support-image">
                                    <h6>پشتیبانی کامل</h6>
                                    <p class="swiper-para">هر لحظه كه نياز داشته باشيد از ابتداي خريد تا زمان تحويل تيم
                                        بارجيل در كنار شما هستند</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div>
                                    <img src="{{ asset('frontend/img/پشتیبانی-1.png') }}" alt=""
                                        class="support-image">
                                    <h6>پشتیبانی کامل</h6>
                                    <p class="swiper-para">هر لحظه كه نياز داشته باشيد از ابتداي خريد تا زمان تحويل تيم
                                        بارجيل در كنار شما هستند</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div>
                                    <img src="{{ asset('frontend/img/پشتیبانی-1.png') }}" alt=""
                                        class="support-image">
                                    <h6>پشتیبانی کامل</h6>
                                    <p class="swiper-para">هر لحظه كه نياز داشته باشيد از ابتداي خريد تا زمان تحويل تيم
                                        بارجيل در كنار شما هستند</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ! Support --}}

    {{-- ! Sale --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-line-center">
                        <h5><span>با کیفیت، با تخفیف!</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative" style="z-index: 0">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">

                            @foreach ($products as $product)
                                @if ($product->status == 1 and $product->sale)
                                    <div class="swiper-slide shadow show-detail">
                                        <div class="product">
                                            <a href="{{ route('pages.product', $product->id) }}">
                                                <img src="{{ asset('image/cover_1') . '/' . $product->cover_1 }}"
                                                    alt="" class="product-image img-fluid">
                                            </a>
                                            <h6 class="me-2">{{ $product->title }}</h6>
                                            @foreach ($parameters as $parameter)
                                                @if ($product->category_id == $parameter->id)
                                                    <a href="{{ route('pages.product-category', $parameter->id) }}"
                                                        class="swiper-para">{{ $parameter->category }}</a>
                                                @endif
                                            @endforeach
                                            <p class="swiper-price mt-2">{{ number_format($product->price) }} تومان</p>
                                        </div>
                                        @if ($product->sale)
                                            <span class="discount">{{ $product->sale }}%</span>
                                        @endif
                                        @if ($product->exist == 0 || $product->storage == 0)
                                            <span class="is-exist">اتمام موجودی</span>
                                        @endif
                                        <div class="visit">
                                            <div class="everything-center h-50">
                                                <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button class="no-button-style">
                                                        <i class="fa fa-shopping-cart" id="shopping-cart"
                                                            role="button"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="everything-center h-50">
                                                <i class="fa fa-search" id="search" role="button" data-bs-toggle="modal"
                                                    data-bs-target="#mimodalejemplo_{{ $product->id }}"></i>
                                            </div>
                                            <div class="everything-center h-100">
                                                <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button class="no-button-style mt-3">
                                                        <i class="fa fa-shopping-basket" id="basket" role="button"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ?  Modal --}}
    @foreach ($products as $product)
        @if ($product->status == 1 and !$product->sale)
            <!-- Modal -->
            <div class="modal fade" id="mimodalejemplo_{{ $product->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset('image/cover_1') . '/' . $product->cover_1 }}" alt=""
                                        class="img-fluid" />
                                </div>

                                <div class="col-6">
                                    <div class="p-4">
                                        <h5>{{ $product->title }}</h5>
                                        <h4 class="mt-4 orange">{{ number_format($product->price) }} تومان</h4>

                                        <div class="mt-4">
                                            <span>بسته بندی:</span>
                                            <span class="silver">قوطی مقوایی</span>
                                        </div>
                                        <div class="mt-3">
                                            <button class="package-type">قوطی فلزی</button>
                                            <button class="package-type">پاکت زیپ‌دار</button>
                                            <button class="package-type">قوطی مقوایی</button>
                                        </div>

                                        <div class="mt-4">
                                            <span>وزن:</span>
                                            <span class="silver">1 کیلوگرم</span>
                                        </div>
                                        <div class="mt-3">
                                            <button class="package-type">1 کیلوگرم</button>
                                            <button class="package-type">500 گرم</button>
                                            <button class="package-type">250 گرم</button>
                                        </div>

                                        <div class="mt-5 d-flex">
                                            <span class="order-value">
                                                {{-- <input type="button" value="-" class="minus">
                                                <input type="number" value="1" min="1" max="7" class="number-order">
                                                <input type="button" value="+" class="plus"> --}}
                                            </span>
                                            <span>
                                                @if ($product->storage)
                                                    <form action="{{ route('add-to-cart', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="add-to-cart">افزودن به سبد خرید</button>
                                                    </form>
                                                @else
                                                    <span>لطفاً تماس بگیرید</span>
                                                @endif
                                            </span>
                                        </div>

                                        <hr class="mt-4 mb-4">

                                        <div class="mt-2">
                                            <span>شناسه محصول:</span>
                                            <span class="silver">4843556479</span>
                                        </div>

                                        <div class="mt-2">
                                            <span>دسته:</span>
                                            @foreach ($parameters as $parameter)
                                                @if ($product->category_id == $parameter->id)
                                                    <a href="{{ route('pages.product-category', $parameter->id) }}"
                                                        class="swiper-para">{{ $parameter->category }}</a>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="mt-2">
                                            <span>اشتراک گذاری:</span>
                                            <span class="silver">
                                                <i class="bi bi-whatsapp"></i>
                                                <i class="bi bi-linkedin"></i>
                                                <i class="bi bi-telegram"></i>
                                                <i class="bi bi-twitter"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endif
    @endforeach

    {{-- ! /Sale --}}

    {{-- ! Banner --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @foreach ($banners as $banner)
                        @if ($banner->position == 'ردیف دوم سمت راست' and $banner->status == 1)
                            <a href="{{ route('pages.product-category', $banner->category_id) }}">
                                <img src="{{ asset('image/banner') . '/' . $banner->image }}" alt="بنر اصلی"
                                    class="img-fluid w-100 h-100">
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-6">
                    @foreach ($banners as $banner)
                        @if ($banner->position == 'ردیف دوم سمت چپ' and $banner->status == 1)
                            <a href="{{ route('pages.product-category', $banner->category_id) }}">
                                <img src="{{ asset('image/banner') . '/' . $banner->image }}" alt="بنر اصلی"
                                    class="img-fluid w-100 h-100">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- ! /Banner --}}

    {{-- ! Special --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-line-center">
                        <h5><span>آجیل ویژه بارجیل</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 position-relative" style="z-index: 0">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">

                            @foreach ($products as $product)
                                @if ($product->status == 1 and !$product->sale)
                                    <div class="swiper-slide shadow show-detail">
                                        <div class="product">
                                            <a href="{{ route('pages.product', $product->id) }}">
                                                <img src="{{ asset('image/cover_1') . '/' . $product->cover_1 }}"
                                                    alt="" class="product-image img-fluid">
                                            </a>
                                            <h6 class="me-2">{{ $product->title }}</h6>
                                            @foreach ($parameters as $parameter)
                                                @if ($product->category_id == $parameter->id)
                                                    <a href="{{ route('pages.product-category', $parameter->id) }}"
                                                        class="swiper-para">{{ $parameter->category }}</a>
                                                @endif
                                            @endforeach
                                            <p class="swiper-price mt-2">{{ number_format($product->price) }} تومان</p>
                                        </div>
                                        @if ($product->sale)
                                            <span class="discount">{{ $product->sale }}%</span>
                                        @endif
                                        @if ($product->exist == 0 || $product->storage == 0)
                                            <span class="is-exist">اتمام موجودی</span>
                                        @endif
                                        <div class="visit">
                                            <div class="everything-center h-50">
                                                <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button class="no-button-style">
                                                        <i class="fa fa-shopping-cart" id="shopping-cart"
                                                            role="button"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="everything-center h-50">
                                                <i class="fa fa-search" id="search" role="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#mimodalejemplo_{{ $product->id }}"></i>
                                            </div>
                                            <div class="everything-center h-100">
                                                <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button class="no-button-style mt-3">
                                                        <i class="fa fa-shopping-basket" id="basket"
                                                            role="button"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ?  Modal --}}
    @foreach ($products as $product)
        @if ($product->status == 1 and !$product->sale)
            <!-- Modal -->
            <div class="modal fade" id="mimodalejemplo_{{ $product->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset('image/cover_1') . '/' . $product->cover_1 }}" alt=""
                                        class="img-fluid" />
                                </div>

                                <div class="col-6">
                                    <div class="p-4">
                                        <h5>{{ $product->title }}</h5>
                                        <h4 class="mt-4 orange">{{ number_format($product->price) }} تومان</h4>

                                        <div class="mt-4">
                                            <span>بسته بندی:</span>
                                            <span class="silver">قوطی مقوایی</span>
                                        </div>
                                        <div class="mt-3">
                                            <button class="package-type">قوطی فلزی</button>
                                            <button class="package-type">پاکت زیپ‌دار</button>
                                            <button class="package-type">قوطی مقوایی</button>
                                        </div>

                                        <div class="mt-4">
                                            <span>وزن:</span>
                                            <span class="silver">1 کیلوگرم</span>
                                        </div>
                                        <div class="mt-3">
                                            <button class="package-type">1 کیلوگرم</button>
                                            <button class="package-type">500 گرم</button>
                                            <button class="package-type">250 گرم</button>
                                        </div>

                                        <div class="mt-5 d-flex">
                                            <span class="order-value">
                                                {{-- <input type="button" value="-" class="minus">
                                                <input type="number" value="1" min="1" max="7" class="number-order">
                                                <input type="button" value="+" class="plus"> --}}
                                            </span>
                                            <span>
                                                @if ($product->storage)
                                                    <form action="{{ route('add-to-cart', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="add-to-cart">افزودن به سبد خرید</button>
                                                    </form>
                                                @else
                                                    <span>لطفاً تماس بگیرید</span>
                                                @endif
                                            </span>
                                        </div>

                                        <hr class="mt-4 mb-4">

                                        <div class="mt-2">
                                            <span>شناسه محصول:</span>
                                            <span class="silver">4843556479</span>
                                        </div>

                                        <div class="mt-2">
                                            <span>دسته:</span>
                                            @foreach ($parameters as $parameter)
                                                @if ($product->category_id == $parameter->id)
                                                    <a href="{{ route('pages.product-category', $parameter->id) }}"
                                                        class="swiper-para">{{ $parameter->category }}</a>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="mt-2">
                                            <span>اشتراک گذاری:</span>
                                            <span class="silver">
                                                <i class="bi bi-whatsapp"></i>
                                                <i class="bi bi-linkedin"></i>
                                                <i class="bi bi-telegram"></i>
                                                <i class="bi bi-twitter"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endif
    @endforeach

    {{-- ! /Special --}}

    {{-- ! Banner --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @foreach ($banners as $banner)
                        @if ($banner->position == 'ردیف سوم سمت راست' and $banner->status == 1)
                            <a href="{{ route('pages.product-category', $banner->category_id) }}">
                                <img src="{{ asset('image/banner') . '/' . $banner->image }}" alt="بنر اصلی"
                                    class="img-fluid w-100 h-100">
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-6">
                    @foreach ($banners as $banner)
                        @if ($banner->position == 'ردیف سوم سمت چپ' and $banner->status == 1)
                            <a href="{{ route('pages.product-category', $banner->category_id) }}">
                                <img src="{{ asset('image/banner') . '/' . $banner->image }}" alt="بنر اصلی"
                                    class="img-fluid w-100 h-100">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- ! /Banner --}}

    {{-- ! New Products --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-line-center">
                        <h5><span>محصولات جدید</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative" style="z-index: 0">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">

                            @foreach ($products as $product)
                                @if ($product->status == 1 and !$product->sale)
                                    <div class="swiper-slide shadow show-detail">
                                        <div class="product">
                                            <a href="{{ route('pages.product', $product->id) }}">
                                                <img src="{{ asset('image/cover_1') . '/' . $product->cover_1 }}"
                                                    alt="" class="product-image img-fluid">
                                            </a>
                                            <h6 class="me-2">{{ $product->title }}</h6>
                                            @foreach ($parameters as $parameter)
                                                @if ($product->category_id == $parameter->id)
                                                    <a href="{{ route('pages.product-category', $parameter->id) }}"
                                                        class="swiper-para">{{ $parameter->category }}</a>
                                                @endif
                                            @endforeach
                                            <p class="swiper-price mt-2">{{ number_format($product->price) }} تومان</p>
                                        </div>
                                        @if ($product->sale)
                                            <span class="discount">{{ $product->sale }}%</span>
                                        @endif
                                        @if ($product->exist == 0 || $product->storage == 0)
                                            <span class="is-exist">اتمام موجودی</span>
                                        @endif
                                        <div class="visit">
                                            <div class="everything-center h-50">
                                                <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button class="no-button-style">
                                                        <i class="fa fa-shopping-cart" id="shopping-cart"
                                                            role="button"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="everything-center h-50">
                                                <i class="fa fa-search" id="search" role="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#mimodalejemplo_{{ $product->id }}"></i>
                                            </div>
                                            <div class="everything-center h-100">
                                                <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button class="no-button-style mt-3">
                                                        <i class="fa fa-shopping-basket" id="basket"
                                                            role="button"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ?  Modal --}}
    @foreach ($products as $product)
        @if ($product->status == 1 and !$product->sale)
            <!-- Modal -->
            <div class="modal fade" id="mimodalejemplo_{{ $product->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset('image/cover_1') . '/' . $product->cover_1 }}" alt=""
                                        class="img-fluid" />
                                </div>

                                <div class="col-6">
                                    <div class="p-4">
                                        <h5>{{ $product->title }}</h5>
                                        <h4 class="mt-4 orange">{{ number_format($product->price) }} تومان</h4>

                                        <div class="mt-4">
                                            <span>بسته بندی:</span>
                                            <span class="silver">قوطی مقوایی</span>
                                        </div>
                                        <div class="mt-3">
                                            <button class="package-type">قوطی فلزی</button>
                                            <button class="package-type">پاکت زیپ‌دار</button>
                                            <button class="package-type">قوطی مقوایی</button>
                                        </div>

                                        <div class="mt-4">
                                            <span>وزن:</span>
                                            <span class="silver">1 کیلوگرم</span>
                                        </div>
                                        <div class="mt-3">
                                            <button class="package-type">1 کیلوگرم</button>
                                            <button class="package-type">500 گرم</button>
                                            <button class="package-type">250 گرم</button>
                                        </div>

                                        <div class="mt-5 d-flex">
                                            <span class="order-value">
                                                {{-- <input type="button" value="-" class="minus">
                                                <input type="number" value="1" min="1" max="7" class="number-order">
                                                <input type="button" value="+" class="plus"> --}}
                                            </span>
                                            <span>
                                                @if ($product->storage)
                                                    <form action="{{ route('add-to-cart', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="add-to-cart">افزودن به سبد خرید</button>
                                                    </form>
                                                @else
                                                    <span>لطفاً تماس بگیرید</span>
                                                @endif
                                            </span>
                                        </div>

                                        <hr class="mt-4 mb-4">

                                        <div class="mt-2">
                                            <span>شناسه محصول:</span>
                                            <span class="silver">4843556479</span>
                                        </div>

                                        <div class="mt-2">
                                            <span>دسته:</span>
                                            @foreach ($parameters as $parameter)
                                                @if ($product->category_id == $parameter->id)
                                                    <a href="{{ route('pages.product-category', $parameter->id) }}"
                                                        class="swiper-para">{{ $parameter->category }}</a>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="mt-2">
                                            <span>اشتراک گذاری:</span>
                                            <span class="silver">
                                                <i class="bi bi-whatsapp"></i>
                                                <i class="bi bi-linkedin"></i>
                                                <i class="bi bi-telegram"></i>
                                                <i class="bi bi-twitter"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endif
    @endforeach

    {{-- ! /New Products --}}

    {{-- ! Blogs --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-line-center">
                        <h5><span>مجله سلامتی</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <div class="swiper mySwiper3">
                        <div class="swiper-wrapper">

                            @foreach ($blogs as $blog)
                                @if ($blog->status == 1)
                                    <div class="swiper-slide shadow text-center loading">
                                        <div class="blogs">
                                            <div>
                                                <div class="position-relative">
                                                    <a href="{{ route('pages.blog', $blog->id) }}">
                                                        <img src="{{ asset('image/blog') . '/' . $blog->image }}"
                                                            alt="" class="blogs-image img-fluid">
                                                        <div class="loading-blog everything-center">
                                                            <div class="dot-loader"></div>
                                                            <div class="dot-loader"></div>
                                                            <div class="dot-loader"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="{{ route('pages.blog', $blog->id) }}" class="blog-title">
                                                        <h6 class="text-center mt-3">{{ $blog->title }}</h6>
                                                    </a>
                                                    <i class="fa fa-share-alt mt-3 share"></i>
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
            </div>
        </div>
    </div>
    {{-- ! /Blogs --}}
    @include('layouts.footer')
@endsection
