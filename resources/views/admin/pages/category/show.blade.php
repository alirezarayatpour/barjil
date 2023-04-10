@extends('admin.layouts.app')
@section('title', 'دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $category->category }}</h5>
                    <div class="d-flex">
                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
