@extends('admin.layouts.app')
@section('title', 'دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>نام دسته‌بندی</label>
                            <input type="text" name="category" class="form-control" value="{{ $category->category }}"/>
                        </div>
                        <div class="form-group">
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="0">بدون دسته‌بندی مادر</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->parent_id = $category->id ? 'selected':'' }}>{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش دسته‌بندی</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
