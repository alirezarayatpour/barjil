@extends('layouts.app')

@section('content')
    <title>سبد خرید | بارجیل</title>
    @include('layouts.header')
    <style>
        body {
            background-color: white;
        }
    </style>
    <div class="container-fluid" style="background: url('frontend/img/back-image.jpg') no-repeat center/cover;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1 class="text-center text-white py-5">سبد خرید</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h6 class="">برای افزودن محصولات دیگر <a href="{{ route('pages.all-products') }}">اینجا</a> کلیک کنید.</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-8">
                    <table class="table align-middle">
                        <tr>
                            <td></td>
                            <td>محصول</td>
                            <td>قیمت</td>
                            <td>تعداد</td>
                            <td>جمع جزء</td>
                        </tr>
                        @foreach($cart as $item)
                            <tr>
                                <td>
                                    <form action="{{ route('cart-remove', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="no-button-style"><i class="bi bi-x"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('pages.product', $item->product->id) }}" class="link-product">
                                        <img src="{{ asset('image/cover_1').'/'.$item->product->cover_1 }}" alt="" width="60px" height="50px" class="img-fluid">
                                        {{ $item->product->title }}
                                    </a>
                                </td>
                                <td class="silver">{{ number_format($item->product->price) }} تومان</td>
                                <td>
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
                                </td>
                                <td class="orange">{{ number_format($item->count * $item->price) }} تومان</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="col-xl-4">
                    <div class="border-filter-bold p-3">
                        <h4>جمع کل سبد خرید</h4>
                        <table class="table mt-3">
                            <tr>
                                <td>جمع جزء</td>
                                <td class="text-start silver">{{ number_format($totalPrice) }} تومان</td>
                            </tr>
                            <tr>
                                <td>مجموع</td>
                                <td class="text-start orange">{{ number_format($totalPrice) }} تومان</td>
                            </tr>
                        </table>
                        <a href="{{ route('checkout') }}" class="btn business d-block py-2">ادامه جهت تسویه حساب</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@include('layouts.footer')
@endsection
