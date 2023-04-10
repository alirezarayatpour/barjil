@extends('admin.layouts.app')
@section('title', 'آیتم‌های Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $footerItem->column }}</h5>
                    <p class="card-text">{{ $footerItem->item }}</p>
                    <p class="card-text">{{ $footerItem->link }}</p>
                    <div class="d-flex">
                        <form action="{{ route('footerItem.destroy', $footerItem->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('footerItem.edit', $footerItem->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
