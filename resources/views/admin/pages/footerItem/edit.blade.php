@extends('admin.layouts.app')
@section('title', 'آیتم‌های Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerItem.update', $footerItem->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>انتخاب ستون</label>
                            <select name="column" id="column" class="form-control">
                                <option value="{{ $footerItem->column }}">{{ $footerItem->column }}</option>
                                <option value="ستون اول">ستون اول</option>
                                <option value="ستون دوم">ستون دوم</option>
                                <option value="ستون سوم">ستون سوم</option>
                                <option value="ستون چهارم">ستون چهارم</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>آیتم‌های ستون</label>
                            <input type="text" name="item" class="form-control" value="{{ $footerItem->item }}"/>
                        </div>
                        <div class="form-group">
                            <label>لینک آیتم‌های ستون</label>
                            <input type="text" name="link" class="form-control" value="{{ $footerItem->link }}"/>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
