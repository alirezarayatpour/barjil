@extends('layouts.app')

@section('content')
    <title>فهرست فرصت های شغلی مجموعه بارجیل برای همکاری | بارجیل</title>
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
                    <h1 class="text-center text-white py-5">همکاری با ما</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <img src="{{ asset('frontend/img/jobs.jpg') }}" alt="jobs" class="w-100 h-100 img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <p class="silver text-center">انتخابی آگاهانه</p>
                    <h4 class="text-center">موقعیت‌های شغلی بارجیل</h4>
                    <div class="mt-3 p-3 shadow">

                        @foreach($jobs as $job)
                            <div>
                                <div class="job-title" role="button">
                                    <i class="fa fa-plus job-title"></i>
                                    {{ $job->title }}
                                </div>
                                <div class="mt-2 silver job">
                                    {!! $job->description !!}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 everything-center">
                    <h4>جهت هماهنگی و ارسال رزومه با یکی از راههای ارتباطی بارجیل</h4>
                </div>
                <div class="col-xl-3">
                    <div class="row text-center">
                        <span class="col-6">
                            <div><i class="fa fa-phone fa-3x text-danger"></i></div>
                            @foreach($contacts as $contact)
                                @if($contact->status == 1)
                                    <div><a href="tel:{{ $contact->phone }}" class="btn call-info">تماس</a></div>
                                @endif
                            @endforeach
                        </span>

                        <span class="col-6">
                            <div><i class="fa fa-envelope fa-3x text-danger"></i></div>
                            @foreach($contacts as $contact)
                                @if($contact->status == 1)
                                    <div><a href="mailto:{{ $contact->email }}" class="btn call-info">ایمیل</a></div>
                                @endif
                            @endforeach
                        </span>
                    </div>
                </div>
                <div class="col-xl-1"></div>
            </div>
        </div>
    </div>

    <script>
        let jobTitle = document.querySelectorAll('.job-title');
        jobTitle.forEach(value => {
           value.addEventListener('click', function (){
               this.nextElementSibling.classList.toggle('active-job');
           })
        });
    </script>
    @include('layouts.footer')
@endsection
