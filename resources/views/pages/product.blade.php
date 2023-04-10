@extends('layouts.app')

@section('content')
    <title>قیمت و خرید آنلاین {{ $product->title }} | بارجیل</title>
    @include('layouts.header')
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: white;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .mySwiper5 {
            height: 80%;
            width: 100%;
        }

        .mySwiper4 {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mySwiper4 .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper4 .swiper-slide-thumb-active {
            opacity: 1;
        }

        /*.gallery {*/
        /*    display: block;*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    object-fit: cover;*/
        /*}*/
    </style>
    <div class="container-fluid mt-5"></div>

    <div class="container-fluid" style="border-bottom: 2px solid #f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">

                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                         class="swiper mySwiper5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('image/cover_1').'/'.$product->cover_1 }}" alt="" class="gallery"/>
                                @if($product->sale)
                                    <span class="discount">10%</span>
                                @endif
                                @if($product->exist == 0 || $product->storage == 0)
                                    <span class="is-exist">اتمام موجودی</span>
                                @endif
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('image/cover_2').'/'.$product->cover_2 }}" alt="" class="gallery"/>
                                @if($product->sale)
                                    <span class="discount">10%</span>
                                @endif
                                @if($product->exist == 0 || $product->storage == 0)
                                    <span class="is-exist">اتمام موجودی</span>
                                @endif
                            </div>

                            @foreach($images as $image)
                                @if($product->id == $image->product_id)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('image/images').'/'.$image->image }}" alt="" class="gallery"/>
                                        @if($product->sale)
                                            <span class="discount">10%</span>
                                        @endif
                                        @if($product->exist == 0 || $product->storage == 0)
                                            <span class="is-exist">اتمام موجودی</span>
                                        @endif
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('image/cover_1').'/'.$product->cover_1 }}" alt="" class="gallery"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('image/cover_2').'/'.$product->cover_2 }}" alt="" class="gallery"/>
                            </div>

                            @foreach($images as $image)
                                @if($product->id == $image->product_id)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('image/images').'/'.$image->image }}" alt="" class="gallery"/>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                </div>

                <div class="col-xl-5">
                    <div class="shadow p-4">
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
                            <span>
                                {{-- @foreach($cart as $item)
                                    <div class="cart-plus-minus">
                                        <form action="{{ route('cart-minus', $item->id) }}" method="POST">
                                            @csrf
                                            <button class="button-add-reduce">-</button>
                                        </form>
                                        <span class="order-number">{{ $item->count }}</span>
                                        <form action="{{ route('cart-plus', $item->id) }}" method="POST">
                                            @csrf
                                            <button class="button-add-reduce">+</button>
                                        </form>
                                    </div>
                                @endforeach --}}
                            </span>
                            <span>
                                @if ($product->storage)
                                    <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
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
                            @foreach($parameters as $parameter)
                                @if($product->category_id == $parameter->id)
                                    <a href="{{ route('pages.product-category', $parameter->id) }}" class="swiper-para">{{ $parameter->category }}</a>
                                @endif
                            @endforeach
                        </div>

                        <div class="mt-2">
                            <span>اشتراک گذاری:</span>
                            <span class="silver">
                                <i class="bi bi-telegram"></i>
                                <i class="bi bi-whatsapp"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-twitter"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2"></div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="p-4">
                        <ul class="tab-product">
                            <li class="tab-product-item" role="button">توضیحات</li>
                            <li class="tab-product-item" role="button">توضیحات تکمیلی</li>
                            <li class="tab-product-item" role="button">نظرات</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="border-bottom: 2px solid #f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="silver content-box" style="display: block;">{!! $product->description !!}</div>
                    <div class="silver content-box" style="display: none;">
                        <div>
                            <span class="text-black ms-3">وزن</span>
                            <span>1 کیلوگرم, 500 گرم, 250 گرم, نمونه</span>
                        </div>
                        <hr/>
                        <div>
                            <span class="text-black ms-3">بسته‌بندی</span>
                            <span>قوطی فلزی, وکیوم, پاکت زیپ دار, قوطی مقوایی, نمونه</span>
                        </div>
                    </div>
                    <div class="content-box" style="display: none;">
                        <div class="text-black">
                            <div class="row mt-4 mt-xl-0">
                                <div class="col-xl-6">
                                    <h5>نظرات</h5>
                                    @foreach($comments as $comment)
                                        @if($product->id == $comment->product_id)
                                            <div class="mt-3">
                                                {{ $comment->user->name }}
                                            </div>
                                            <div class="silver mt-2">
                                                {{ $comment->comment }}
                                            </div>
                                            <div class="mt-2">
                                                @for($i = 0; $i < $comment->rating; $i++)
                                                    <i class="fa fa-star cheked"></i>
                                                @endfor
                                            </div>
                                            <div class="mt-2">
                                                <a href="javascript:void(0)" class="btn business" onclick="reply(this)"
                                                data-comment-id="{{ $comment->id }}">
                                                پاسخ
                                                </a>
                                            </div>
                                            @foreach ($reply as $item)
                                                @if($item->comment_id == $comment->id)
                                                    <div class="mt-2 me-3">
                                                        {{ $item->user->name }}
                                                    </div>
                                                    <div class="mt-2 me-3 silver">
                                                        {{ $item->reply }}
                                                    </div>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach

                                    {{--! Reply !--}}
                                    <div class="mt-2 reply-div" style="display: none;">
                                        <form action="{{ route('reply') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="comment_id" id="comment_id" />
                                            <textarea name="reply" id="reply" cols="20" rows="5" class="form-control"></textarea>
                                            <button class="btn button-orange mt-2">پاسخ</button>
                                            <a href="javascript:void(0)" class="btn button-orange mt-2" onclick="reply_close(this)">بستن</a>
                                        </form>
                                    </div>
                                    {{--! Reply !--}}

                                </div>
                                <div class="col-xl-6">
                                    <div class="text-black">اولین کسی باشید که دیدگاهی می‌نویسد "{{ $product->title }}"</div>
                                    <br/>
                                    @if(Auth::user())
                                        <form action="{{ route('comment', $product->id) }}" method="POST">
                                            @csrf

                                            <div class="rating">
                                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                            </div>

                                            <div class="form-group">
                                                <label for="comment" class="form-label">نظر شما</label>
                                                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                            <button class="mt-3 btn business">ثبت نظر</button>
                                        </form>
                                    @else
                                        <div>برای فرستادن دیدگاه، باید <a href="{{ route('login') }}">وارد شده</a> باشید.</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h4 class="text-center">محصولات مرتبط</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative border-related" style="z-index: 0;">
                    <div class="swiper mySwiper6">
                        <div class="swiper-wrapper">

                            @foreach($products as $product)
                                <div class="swiper-slide show-detail" style="border-left: 2px solid #f6f6f6;">
                                    <div class="text-center related">
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
                                    <div class="visit">
                                        <div class="everything-center h-50">
                                            <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                                @csrf
                                                <button class="no-button-style">
                                                    <i class="fa fa-shopping-cart" id="shopping-cart" role="button"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="everything-center h-50">
                                            <i class="fa fa-search" id="search" role="button" data-bs-toggle="modal" data-bs-target="#mimodalejemplo_{{ $product->id }}"></i>
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
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($products as $product)
         {{--! Modal --}}
        <div class="modal fade" id="mimodalejemplo_{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ asset('image/cover_1').'/'.$product->cover_1 }}" alt="" class="img-fluid"/>
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
                                                <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
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
                                        @foreach($parameters as $parameter)
                                            @if($product->category_id == $parameter->id)
                                                <a href="{{ route('pages.product-category', $parameter->id) }}" class="swiper-para">{{ $parameter->category }}</a>
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
    @endforeach

    @include('layouts.footer')
@endsection
