@extends('admin.layouts.app')
@section('title', 'ستون‌های Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerItem.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>انتخاب ستون</label>
                            <select name="column" id="column" class="form-control @error('column') is-invalid @enderror">
                                <option disabled selected>انتخاب ستون</option>
                                <option value="ستون اول">ستون اول</option>
                                <option value="ستون دوم">ستون دوم</option>
                                <option value="ستون سوم">ستون سوم</option>
                                <option value="ستون چهارم">ستون چهارم</option>
                            </select>
                            @error('column')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>آیتم‌های ستون</label>
                            <input type="text" name="item" class="form-control @error('item') is-invalid @enderror" 
                            value="{{ old('item') }}" placeholder="آیتم‌های ستون را وارد کنید"/>
                            @error('item')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>لینک آیتم‌های ستون</label>
                            <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" 
                            value="{{ old('link') }}" placeholder="لینک آیتم‌های ستون را وارد کنید"/>
                            @error('link')
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
