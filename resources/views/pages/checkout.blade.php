@extends('layouts.app')

@section('content')
    <title>تسویه حساب | بارجیل</title>
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
                    <h1 class="text-center text-white py-5">تسویه حساب</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <form action="{{ route('order') }}" class="mt-3" method="POST" style="font-size: 14px">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">نام *</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}"/>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">آدرس *</label>
                            <input type="text" name="address" class="form-control" placeholder="نام خیابان و پلاک خانه"/>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">استان *</label>
                            <select name="state" id="state" class="form-control">
                                <option>یک گزینه انتخاب کنید</option>
                                <option value="تهران">تهران</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">شهر *</label>
                            <input type="text" name="city" class="form-control" />
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">کد پستی (بدون فاصله و با اعداد انگلیسی) *</label>
                            <input type="text" name="codePost" class="form-control" />
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">تلفن ثابت *</label>
                            <input type="text" name="phoneMain" class="form-control" />
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">موبایل *</label>
                            <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}"/>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">ایمیل *</label>
                            <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}"/>
                        </div>

                        <h5 class="mt-4">توضیحات تکمیلی</h5>
                        <div class="form-group mt-3">
                            <label class="form-label">توضیحات سفارش (اختیاری) *</label>
                            <textarea name="description" cols="30" rows="6" class="form-control"></textarea>
                        </div>

                </div>

                <div class="col-xl-6">
                    <div class="p-3">
                        <h5 class="text-center">سفارش شما</h5>
                        <table class="table mt-3">
                            <tr>
                                <td>محصول</td>
                                <td class="text-start">جمع جزء</td>
                            </tr>
                            @foreach($cart as $item)
                                <tr class="silver">
                                    <input type="hidden" value="{{ $item->product->id }}" name="product_id">
                                    <td>{{ $item->product->title }}<span class="silver me-2">{{ $item->count }}x</span></td>
                                    <td class="text-start">{{ number_format($item->product->price) }} تومان</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>جمع جزء</td>
                                <td class="text-start orange">{{ number_format($totalPrice) }} تومان</td>
                            </tr>
                            <tr>
                                <td>مجموع</td>
                                <td class="text-start orange">{{ number_format($totalPrice) }} تومان</td>
                            </tr>
                        </table>

                        <div class="form-group mt-3">
                            <input type="radio" name="pay" value="پی‌پینگ" class="form-check-input"/>
                            <label for="pay" class="form-check-label">پرداخت از طریق پی‌پینگ</label>
                        </div>
                        <div class="form-group mt-3">
                            <input type="radio" name="pay" value="زرین‌پال" class="form-check-input"/>
                            <label for="pay" class="form-check-label">پرداخت امن زرین‌پال</label>
                        </div>
                        <hr>
                        <div class="form-group mt-3">
                            <input type="checkbox" name="agree" class="form-check-input"/>
                            <label for="agree" class="form-check-label">من شرایط و مقررات سایت را خوانده ام و آن را می پذیرم. *</label>
                        </div>

                        <button class="btn business w-100 mt-3 py-2">ثبت سفارش</button>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
