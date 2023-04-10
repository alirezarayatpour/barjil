@extends('admin.layouts.app')
@section('title', 'مدیریت کاربران')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>نام</label>
                            <input type="text" name="name" class="form-control" placeholder="نام را وارد کنید"/>
                        </div>
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input type="email" name="email" class="form-control" placeholder="ایمیل را وارد کنید"/>
                        </div>
                        <div class="form-group">
                            <label>رمز عبور</label>
                            <input type="password" name="password" class="form-control" placeholder="رمز عبور را وارد کنید"/>
                        </div>
                        <div class="form-group">
                            <label>نقش</label>
                            <select name="role" id="role" class="form-control">
                                <option disabled selected>انتخاب نقش</option>
                                <option value="1">مدیر</option>
                                <option value="2">نویسنده</option>
                                <option value="3">کاربر عادی</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
