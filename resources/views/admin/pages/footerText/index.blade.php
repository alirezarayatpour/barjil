@extends('admin.layouts.app')
@section('title', 'متن Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('footerText.create') }}" class="btn btn-primary">ایجاد</a>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">متن</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">حذف</th>
                            <th scope="col">ویرایش</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($footerTexts as $footerText)
                            <tr>
                                <th scope="row">{{ $footerText->id }}</th>
                                <td>{!! $footerText->body !!}</td>

                                @switch($footerText->status)
                                    @case(0)
                                    @php
                                        $url = route('footerText.status', $footerText->id);
                                        $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                    @endphp
                                    @break

                                    @case(1)
                                    @php
                                        $url = route('footerText.status', $footerText->id);
                                        $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                    @endphp
                                    @break
                                @endswitch

                                <td>{!! $status !!}</td>
                                <td>
                                    <form action="{{ route('footerText.destroy', $footerText->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('footerText.edit', $footerText->id) }}" class="btn btn-primary mr-2">ویرایش</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
