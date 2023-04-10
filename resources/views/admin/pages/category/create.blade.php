@extends('admin.layouts.app')
@section('title', 'دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>نام دسته‌بندی</label>
                            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" 
                            value="{{ old('title') }}" placeholder="نام دسته‌بندی را وارد کنید"/>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>نام دسته‌بندی مادر</label>
                            <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                <option value="0">بدون دسته‌بندی مادر</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ایجاد دسته‌بندی</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
