@extends('admin.layouts.app')
@section('title', 'سفارشات سازمانی')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

{{--            <a href="{{ route('organization.create') }}" class="btn btn-primary">ایجاد</a>--}}

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام و نام خانوادگی</th>
                                <th scope="col">نام سازمان</th>
                                <th scope="col">شماره تماس</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($organizations as $organization)
                                <tr>
                                    <th scope="row">{{ $organization->id }}</th>
                                    <td>{{ $organization->fullname }}</td>
                                    <td>{{ $organization->organization }}</td>
                                    <td>{{ $organization->phone }}</td>


{{--                                    @switch($organization->status)--}}
{{--                                        @case(0)--}}
{{--                                        @php--}}
{{--                                            $url = route('organization.status', $organization->id);--}}
{{--                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";--}}
{{--                                        @endphp--}}
{{--                                        @break--}}

{{--                                        @case(1)--}}
{{--                                        @php--}}
{{--                                            $url = route('organization.status', $organization->id);--}}
{{--                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";--}}
{{--                                        @endphp--}}
{{--                                        @break--}}
{{--                                    @endswitch--}}

{{--                                    <td>{!! $status !!}</td>--}}
{{--                                    <td><a href="{{ route('organization.show', $organization->id) }}" class="btn btn-info">مدیریت</a></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $organizations->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
