@extends('admin.layouts.app')
@section('title', 'ستون‌های Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('banner.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود بنر</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>موقعیت بنر</label>
                            <select name="position" id="position" class="form-control">
                                <option value="{{ $banner->position }}" {{ $banner->position == $banner->id ? 'selected':'' }} >{{ $banner->position }}</option>
                                <option value="ردیف اول سمت راست">ردیف اول سمت راست</option>
                                <option value="ردیف اول سمت چپ بالا">ردیف اول سمت چپ بالا</option>
                                <option value="ردیف اول سمت چپ پایین">ردیف اول سمت چپ پایین</option>
                                <option value="ردیف دوم سمت راست">ردیف دوم سمت راست</option>
                                <option value="ردیف دوم سمت چپ">ردیف دوم سمت چپ</option>
                                <option value="ردیف سوم سمت راست">ردیف سوم سمت راست</option>
                                <option value="ردیف سوم سمت چپ">ردیف سوم سمت چپ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">انتخاب دسته‌بندی</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    @if($category->parent_id != 0)
                                        <option value="{{ $category->id }}" {{ $banner->category_id == $category->id ? 'selected':'' }}>{{ $category->category }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
