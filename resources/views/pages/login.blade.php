@extends('layouts.app')
@section('content')
    <title>ورود و ثبت نام | بارجیل</title>

    <div class="container">
        <div class="row">
            <div class="my-account-container">
                <div class="my-account">
                    @foreach($logos as $logo)
                        @if($logo->position == 'منو بالا' and $logo->status == 1)
                            <a href="{{ route('pages.index') }}">
                                <img src="{{ asset('image/logo').'/'.$logo->image }}" alt="barjil" class="img-fluid d-block mx-auto">
                            </a>
                        @endif
                    @endforeach
                    <h5 class="text-center mt-4">ورود / ثبت نام</h5>
                    <h6 class="text-center mt-4 silver">تلفن همراه یا پست الکترونیک خود را وارد کنید</h6>
                    <form action="">
                        <input type="tel" name="tel" class="form-control mt-4"/>
                    </form>
                    <button class="login-my-account">ورود</button>
                    <p class="text-center mt-4 silver">ورود شما به معنای پذیرش <a href="{{ route('pages.terms-and-conditions') }}">شرایط بارجیل</a> است.</p>
                    <a href="{{ route('pages.index') }}" class="d-block text-center swiper-para">بازگشت</a>
                </div>
            </div>
        </div>
    </div>

@endsection
