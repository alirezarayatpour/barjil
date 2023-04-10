@extends('layouts.app')

@section('content')
   <title>حساب کاربری | بارجیل</title>
   @include('layouts.header')
   <style>
      body {
         background-color: white;
      }
   </style>
   <div class="container-fluid" style="background: url('../frontend/img/back-image.jpg') no-repeat center/cover;">
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
            <div class="col-xl-9" style="border-right: 1px solid #939393;">
               <form action="{{ route('change', auth()->user()->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                     <label class="form-label">نام *</label>
                     <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                  </div>
                  <div class="form-group mt-3">
                     <label class="form-label">آدرس ایمیل *</label>
                     <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                  </div>
                  <div class="form-group mt-3">
                     <label class="form-label">شماره همراه *</label>
                     <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                  </div>
                  <div class="form-group mt-3">
                     <label class="form-label">گذر واژه فعلی *</label>
                     <input type="password" class="form-control" name="current_password">
                  </div>
                  <div class="form-group mt-3">
                     <label class="form-label">گذر واژه جدید *</label>
                     <input type="password" class="form-control" name="password">
                  </div>
                  <div class="form-group mt-3">
                     <label class="form-label">تکرار گذر واژه جدید *</label>
                     <input type="password" class="form-control" name="password_confirmation">
                  </div>
                  <button class="btn business p-2 mt-3">ذخیره تغییرات</button>
               </form>
            </div>
         </div>
      </div>
   </div>

   @include('layouts.footer')
@endsection
