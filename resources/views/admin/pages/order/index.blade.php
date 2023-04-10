@extends('admin.layouts.app')
@section('title', 'سفارشات')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

           <a href="{{ route('order.history') }}" class="btn btn-primary">محصولات تکمیل شده</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">سفارش</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">مشاهده</th>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ number_format($item->total_price) }} تومان</td>
                                        <td>{{ $item->status == 0 ? 'انتظار' : 'تکمیل شده' }}</td>
                                        <td><a href="{{ route('order.show', $item->id) }}" class="btn btn-primary">مشاهده</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $order->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
