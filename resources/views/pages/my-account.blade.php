@extends('layouts.app')

@section('content')
    <title>حساب کاربری | بارجیل</title>
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
                    <h1 class="text-center text-white py-5">حساب کاربری</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    @include('layouts.aside')
                </div>
                <div class="col-xl-9"></div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
