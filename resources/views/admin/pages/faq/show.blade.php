@extends('admin.layouts.app')
@section('title', 'پرسش‌های متداول')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $faq->title }}</h5>
                    <p class="card-text">{!! $faq->description !!}</p>
                    <div class="d-flex">
                        <form action="{{ route('faq.destroy', $faq->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
