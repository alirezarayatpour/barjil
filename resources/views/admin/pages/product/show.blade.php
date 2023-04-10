@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">

               <div class="table-responsive">
                  <table class="table align-middle">
                     <tr>
                        <td>تصاویر محصول</td>
                        <td>
                           <img src="{{ asset('image/cover_1').'/'.$product->cover_1 }}" alt=""
                                class="img-fluid mt-3 mr-3" style="width: 100px; height: 100px;"/>
                           <img src="{{ asset('image/cover_2').'/'.$product->cover_2 }}" alt=""
                                class="img-fluid mt-3 mr-3" style="width: 100px; height: 100px;"/>
                           @foreach($images as $image)
                              @if($product->id == $image->product_id)
                                 <img src="{{ asset('image/images'.'/'.$image->image) }}" alt=""
                                      class="img-fluid mt-3 mr-3" style="width: 100px; height: 100px;">
                              @endif
                           @endforeach
                        </td>
                     </tr>
                     <tr>
                        <td>نام محصول</td>
                        <td>{{ $product->title }}</td>
                     </tr>
                     <tr>
                        <td>توضیحات</td>
                        <td>{!! $product->description !!}</td>
                     </tr>
                     <tr>
                        <td>تعداد محصول</td>
                        <td>{{ $product->storage }}</td>
                     </tr>
                     <tr>
                        <td>قیمت</td>
                        <td>{{ number_format($product->price) }} تومان</td>
                     </tr>
                     <tr>
                        <td>تخفیف</td>
                        <td>{{ $product->sale }}@if($product->sale)%@endif @if(!$product->sale) ندارد @endif</td>
                     </tr>
                     <tr>
                        <td>
                           <form action="{{ route('product.destroy', $product->id) }}" method="post">
                              @csrf
                              <button class="btn btn-danger">حذف</button>
                           </form>
                        </td>
                        <td>
                           <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                        </td>
                     </tr>
                  </table>
               </div>

            </div>
         </div>
      </div>
   </div>
@endsection
