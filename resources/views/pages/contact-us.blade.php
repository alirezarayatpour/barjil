@extends('layouts.app')

@section('content')
    <title>تماس با ما | بارجیل</title>
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
                    <h1 class="text-center text-white py-5">تماس با ما</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h4 class="brown">در دسترس‌تان هستیم!</h4>
                    <div class="mt-3 silver" style="font-size: 14px">
                        برای تماس با ما راه‌های زیادی هست و اطمینان می‌دهیم از هر طریقی که انتخاب کنید، پاسخگوی شما خواهیم بود.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="shadow contact-us">
                        <h5 class="brown">فرم تماس با ما</h5>
                        <div class="mt-3 silver" style="font-size: 14px">
                            پر کردن فرم زیر تنها 30 ثانیه از وقت شما را خواهد گرفت. (حتی شاید کمتر)
                        </div>
                        <form action="{{ route('ask.store') }}" class="mt-3" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">* نام</label>
                                <input type="text" name="firstname" class="form-control" />
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label">* نام خانوادگی</label>
                                <input type="text" name="lastname" class="form-control" />
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label">* آدرس ایمیل</label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label">* یاداشت شما</label>
                                <textarea name="note" id="note" cols="30" rows="6" class="form-control"></textarea>
                            </div>
                            <button class="send-button">ارسال</button>
                        </form>
                    </div>
                </div>

                <div class="col-xl-6 mt-xl-0 mt-3">
                    <div class="shadow contact-us">
                        <h5 class="brown">روش‌های دیگر تماس با ما</h5>
                        <div class="mt-3 silver" style="font-size: 14px">
                            ما از ساعت 8 صبح تا 9 شب در خدمت شما هستیم.
                        </div>
                        <div class="mt-3 silver" style="font-size: 14px">
                            شماره تلفن:
                            @foreach($contacts as $contact)
                                @if($contact->status == 1)
                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="mt-3 silver" style="font-size: 14px">
                            ایمیل:
                            @foreach($contacts as $contact)
                                @if($contact->status == 1)
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="mt-3 silver" style="font-size: 14px">
                            شماره واستاپ:
                            @foreach($contacts as $contact)
                                @if($contact->status == 1)
                                    <a href="tel:{{ $contact->whatsapp }}">{{ $contact->whatsapp }}</a>
                                @endif
                            @endforeach
                        </div>
                        <h5 class="brown mt-4">در شبکه‌های اجتماعی هم هستیم</h5>
                        <div class="mt-5 d-flex justify-content-between">
                            @foreach($socials as $social)
                                @if($social->status == 1)
                                    <a href="https://{{ $social->link }}" class="text-white">
                                        <sapn class="social everything-center" style="background-color: {{ $social->color }}">
                                            <i class="{{ $social->icon }}"></i>
                                        </sapn>
                                    </a>
                                @endif
                            @endforeach
                            <a href="#" style="color: white">
                                <sapn class="twitter everything-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                    </svg>
                                </sapn>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10512.145191963918!2d51.402187054691694!3d35.69749050556732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfa!2s!4v1656584766196!5m2!1sfa!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
