<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('frontend/css/nouislider.min.css') }}">--}}

    @foreach($logos as $logo)
        @if($logo->position == 'favicon' and $logo->status == 1)
            <link rel="icon" href="{{ asset('image/logo').'/'.$logo->image }}">
        @endif
    @endforeach

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    @yield('css')
</head>
<body>

{{--    @include('layouts.header')--}}

    <div>
        @yield('content')
    </div>

{{--    @include('layouts.footer')--}}

    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/persianumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/all.js') }}"></script>
    <script src="{{ asset('frontend/js/jalali.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
{{--    <script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>--}}

    <script>
        $(document).ready(function (){
            $('*').persiaNumber();
        });
    </script>
</body>
</html>
