@extends('admin.layouts.app')
@section('title', 'پرسش‌های متداول')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('faq.update', $faq->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>عنوان شغل</label>
                            <input type="text" name="title" class="form-control" value="{{ $faq->title }}"/>
                        </div>
                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea id="mytextarea" name="description">{!! $faq->description !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
