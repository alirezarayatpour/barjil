@extends('layouts.app')

@section('content')
    <title>شرایط و قوانین استفاده از خدمات فروشگاه آنلاین ما | بارجیل</title>
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
                    <h1 class="text-center text-white py-5">
                        @foreach($terms as $term)
                            @if($term->status == 1)
                                {{ $term->title }}
                            @endif
                        @endforeach
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 silver">
                    @foreach($terms as $term)
                        @if($term->status == 1)
                            {!! $term->description !!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
