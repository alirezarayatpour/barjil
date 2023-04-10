@extends('admin.layouts.app')
@section('title', 'اطلاعات تماس')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>شماره تلفن</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                            value="{{ old('phone') }}" placeholder="شماره تلفن را وارد کنید"/>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>آدرس ایمیل</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" placeholder="آدرس ایمیل را وارد کنید"/>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>شماره واتساپ</label>
                            <input type="text" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" 
                            value="{{ old('whatsapp') }}" placeholder="شماره واتساپ را وارد کنید"/>
                            @error('whatsapp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
