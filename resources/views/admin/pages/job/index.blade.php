@extends('admin.layouts.app')
@section('title', 'درخواست همکاری')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('job.create') }}" class="btn btn-primary">ایجاد</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">توضیحات</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <th scope="row">{{ $job->id }}</th>
                                    <td>{{ $job->column }}</td>
                                    <td>{!! Str::limit($job->description, '100') !!}</td>

                                    @switch($job->status)
                                        @case(0)
                                        @php
                                            $url = route('job.status', $job->id);
                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                        @endphp
                                        @break

                                        @case(1)
                                        @php
                                            $url = route('job.status', $job->id);
                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                        @endphp
                                        @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('job.show', $job->id) }}" class="btn btn-info">مدیریت</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
