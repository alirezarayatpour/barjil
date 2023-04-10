@extends('admin.layouts.app')
@section('title', 'درباره ما')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $aboutUs->title }}</h5>
                    <p class="card-text">{!! $aboutUs->description !!}</p>
                    <div class="d-flex">
                        <form action="{{ route('aboutUs.destroy', $aboutUs->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('aboutUs.edit', $aboutUs->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
