@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('product.create') }}" class="btn btn-primary">ایجاد محصول جدید</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام محصول</th>
                                <th scope="col">تعداد محصول</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">تخفیف</th>
                                <th scope="col">موجودی</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <th scope="row">{{ $product->title }}</th>
                                    <th scope="row">{{ $product->storage }}</th>
                                    <th scope="row">{{ number_format($product->price) }}</th>
                                    <th scope="row">{{ $product->sale }}@if($product->sale)%@endif @if(!$product->sale) ندارد @endif</th>

                                    @switch($product->exist)
                                        @case(0)
                                        @php
                                            $url = route('product.exist', $product->id);
                                            $exist = "<a href='".$url."' class='btn btn-danger text-white'>ناموجود</a>";
                                        @endphp
                                        @break

                                        @case(1)
                                        @php
                                            $url = route('product.exist', $product->id);
                                            $exist = "<a href='".$url."' class='btn btn-success text-white'>موجود</a>";
                                        @endphp
                                        @break
                                    @endswitch

                                    <td>{!! $exist !!}</td>

                                    @switch($product->status)
                                        @case(0)
                                        @php
                                            $url = route('product.status', $product->id);
                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                        @endphp
                                        @break

                                        @case(1)
                                        @php
                                            $url = route('product.status', $product->id);
                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                        @endphp
                                        @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('product.show', $product->id) }}" class="btn btn-info">مدیریت</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $products->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
