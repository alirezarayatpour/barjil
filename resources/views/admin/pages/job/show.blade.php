@extends('admin.layouts.app')
@section('title', 'درخواست همکاری')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-2">{{ $job->title }}</h5>
                    <p class="card-text">{!! $job->description !!}</p>
                    <div class="d-flex">
                        <form action="{{ route('job.destroy', $job->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('job.edit', $job->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
