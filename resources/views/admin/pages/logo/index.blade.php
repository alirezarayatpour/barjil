@extends('admin.layouts.app')
@section('title', 'لوگو')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('logo.create') }}" class="btn btn-primary">ایجاد لوگو</a>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">موقعیت</th>
                            <th scope="col">لوگو</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">مدیریت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logos as $logo)
                            <tr>
                                <th scope="row">{{ $logo->id }}</th>
                                <td>{{ $logo->position }}</td>
                                <td><img src="{{ asset('image/logo').'/'.$logo->image }}" alt="" width="50px" height="50px"></td>

                                @switch($logo->status)
                                    @case(0)
                                    @php
                                        $url = route('logo.status', $logo->id);
                                        $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                    @endphp
                                    @break

                                    @case(1)
                                    @php
                                        $url = route('logo.status', $logo->id);
                                        $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                    @endphp
                                    @break
                                @endswitch

                                <td>{!! $status !!}</td>
                                <td><a href="{{ route('logo.show', $logo->id) }}" class="btn btn-info">مدیریت</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
