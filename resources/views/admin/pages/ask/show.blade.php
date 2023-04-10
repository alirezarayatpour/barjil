@extends('admin.layouts.app')
@section('title', 'سوالات کاربران')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>نام</td>
                                    <td>{{ $ask->firstname }}</td>
                                </tr>
                                <tr>
                                    <td>نام خانوادگی</td>
                                    <td>{{ $ask->lastname }}</td>
                                </tr>
                                <tr>
                                    <td>ایمیل</td>
                                    <td>{{ $ask->email }}</td>
                                </tr>
                                <tr>
                                    <td>یادداشت شما</td>
                                    <td>{{ $ask->note }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
{{--                    <div class="d-flex">--}}
{{--                        <form action="{{ route('aboutUs.destroy', $aboutUs->id) }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <button class="btn btn-danger">حذف</button>--}}
{{--                        </form>--}}
{{--                        <a href="{{ route('aboutUs.edit', $aboutUs->id) }}" class="btn btn-primary mr-2">ویرایش</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
