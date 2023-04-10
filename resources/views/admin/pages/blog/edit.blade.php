@extends('admin.layouts.app')
@section('title', 'وبلاگ')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>عنوان</label>
                            <input type="text" name="title" class="form-control" value="{{ $blog->title }}"/>
                        </div>
                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea id="mytextarea" name="description">{{ $blog->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>عکس</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
