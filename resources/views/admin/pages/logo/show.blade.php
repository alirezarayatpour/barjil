@extends('admin.layouts.app')
@section('title', 'لوگو')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <img src="{{ asset('image/logo').'/'.$logo->image }}" alt="" class="img-fluid mt-3 mr-3" style="width: 100px; height: 100px;"/>
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $logo->position }}</h5>
                    <div class="d-flex">
                        <form action="{{ route('logo.destroy', $logo->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('logo.edit', $logo->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
