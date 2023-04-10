@extends('admin.layouts.app')
@section('title', 'سفارشات')
@section('content')
    <!-- ============================================================== -->
    <div class="row">

        <div class="col-md-6">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>مشخصات خریدار</h4>
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th scope="col">نام</th>
                                <th scope="col">{{ $order->name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">آدرس</th>
                              <th scope="col">{{ $order->address }}</th>
                          </tr>
                          <tr>
                              <th scope="col">استان</th>
                              <th scope="col">{{ $order->state }}</th>
                          </tr>
                          <tr>
                              <th scope="col">شهر</th>
                              <th scope="col">{{ $order->city }}</th>
                          </tr>
                          <tr>
                              <th scope="col">کد پستی</th>
                              <th scope="col">{{ $order->codePost }}</th>
                          </tr>
                          <tr>
                              <th scope="col">تلفن ثابت</th>
                              <th scope="col">{{ $order->phoneMain }}</th>
                          </tr>
                          <tr>
                              <th scope="col">موبایل</th>
                              <th scope="col">{{ $order->phone }}</th>
                          </tr>
                          <tr>
                              <th scope="col">ایمیل</th>
                              <th scope="col">{{ $order->email }}</th>
                          </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
          <div class="card mt-2">
               <div class="card-body">
                    <div class="table-responsive">
                         <h4>جزئیات سفارش</h4>
                         <table class="table align-middle mt-3">
                              <thead>
                                   <tr>
                                       <th scope="col">محصول</th>
                                       <th scope="col">تعداد</th>
                                       <th scope="col">قیمت</th>
                                       <th scope="col">عکس</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach ($order->order_item as $item)
                                        <tr>
                                             <td>{{ $item->product->title }}</td>
                                             <td>{{ $item->count }}</td>
                                             <td>{{ number_format($item->price) }} تومان</td>
                                             <td>
                                                  <img src="{{ asset('image/cover_1').'/'.$item->product->cover_1 }}" alt="" width="50px" height="50px">
                                             </td>
                                        </tr>
                                   @endforeach
                                   <tr>
                                        <td colspan="3">قیمت نهایی</td>
                                        <td>{{ number_format($total_price) }} تومان</td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>

                    <div class="form-group">
                         <label class="form-label">وضعیت محصول</label>
                         <form action="{{ route('order.update', $order->id) }}" method="POST">
                              @csrf
                              <select name="order_status" id="order_status" class="form-control @error('order_status') is-invalid @enderror">
                                   <option value="0" {{ $order->status == '0' ? 'selected' : '' }}>انتظار</option>
                                   <option value="1" {{ $order->status == '1' ? 'selected' : '' }}>تکمیل شده</option>
                              </select>
                              <button class="btn btn-primary mt-3">به روزرسانی</button>
                         </form>
                     </div>

               </div>
          </div>
        </div>

    </div>
@endsection
