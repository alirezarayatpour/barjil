@extends('admin.layouts.app')
@section('title', 'بنر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود بنر</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>موقعیت بنر</label>
                            <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                                <option disabled selected>انتخاب موقعیت</option>
                                <option value="ردیف اول سمت راست">ردیف اول سمت راست</option>
                                <option value="ردیف اول سمت چپ بالا">ردیف اول سمت چپ بالا</option>
                                <option value="ردیف اول سمت چپ پایین">ردیف اول سمت چپ پایین</option>
                                <option value="ردیف دوم سمت راست">ردیف دوم سمت راست</option>
                                <option value="ردیف دوم سمت چپ">ردیف دوم سمت چپ</option>
                                <option value="ردیف سوم سمت راست">ردیف سوم سمت راست</option>
                                <option value="ردیف سوم سمت چپ">ردیف سوم سمت چپ</option>
                            </select>
                            <span class="text-danger">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>انتخاب دسته‌بندی</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <label class="form-label">انتخاب دسته‌بندی</label>
                                <option disabled selected>انتخاب دسته‌بندی</option>
                                @foreach($categories as $category)
                                    @if($category->parent_id != 0)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('category_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ایجاد بنر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
