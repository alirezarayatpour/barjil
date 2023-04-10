@extends('admin.layouts.app')
@section('title', 'بنر')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <img src="{{ asset('image/banner').'/'.$banner->image }}" alt="" class="img-fluid mt-3 mr-3" style="width: 200px; height: 100px;"/>
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $banner->position }}</h5>
                    <div class="d-flex">
                        <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
