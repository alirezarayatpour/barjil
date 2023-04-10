@extends('admin.layouts.app')
@section('title', 'سوالات کاربران')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

{{--            <a href="{{ route('ask.create') }}" class="btn btn-primary">ایجاد</a>--}}

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">یادداشت شما</th>
                                <th scope="col">مشاهده کامل</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($asks as $ask)
                                <tr>
                                    <th scope="row">{{ $ask->id }}</th>
                                    <td>{{ $ask->firstname }}</td>
                                    <td>{{ $ask->lastname }}</td>
                                    <td>{{ $ask->email }}</td>
                                    <td>{!! Str::limit($ask->note, '100') !!}</td>


{{--                                    @switch($ask->status)--}}
{{--                                        @case(0)--}}
{{--                                        @php--}}
{{--                                            $url = route('ask.status', $ask->id);--}}
{{--                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";--}}
{{--                                        @endphp--}}
{{--                                        @break--}}

{{--                                        @case(1)--}}
{{--                                        @php--}}
{{--                                            $url = route('ask.status', $ask->id);--}}
{{--                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";--}}
{{--                                        @endphp--}}
{{--                                        @break--}}
{{--                                    @endswitch--}}

{{--                                    <td>{!! $status !!}</td>--}}
                                    <td><a href="{{ route('ask.show', $ask->id) }}" class="btn btn-info">مشاهده کامل</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $asks->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
