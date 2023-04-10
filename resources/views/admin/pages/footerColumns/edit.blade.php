@extends('admin.layouts.app')
@section('title', 'ستون‌های Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerColumns.update', $footerColumns->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>انتخاب ستون (لطفا هنگام ویرایش دوباره شماره ستون را انتخاب کنید)</label>
                            <select name="column" id="column" class="form-control">
                                <option disabled selected>انتخاب ستون</option>
                                <option value="ستون اول">ستون اول</option>
                                <option value="ستون دوم">ستون دوم</option>
                                <option value="ستون سوم">ستون سوم</option>
                                <option value="ستون چهارم">ستون چهارم</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>عنوان ستون</label>
                            <input type="text" name="title" class="form-control" value="{{ $footerColumns->title }}"/>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
