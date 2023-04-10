@extends('admin.layouts.app')
@section('title', 'قوانین و مقررات')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $term->title }}</h5>
                    <p class="card-text">{!! $term->description !!}</p>
                    <div class="d-flex">
                        <form action="{{ route('term.destroy', $term->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('term.edit', $term->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
