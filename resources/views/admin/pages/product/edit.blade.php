@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label class="form-label">عنوان</label>
                     <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                  </div>
                  <div class="form-group">
                     <label class="form-label">توضیحات محصول</label>
                     <textarea id="mytextarea" name="description">{!! $product->description !!}</textarea>
                  </div>
                  <div class="form-group">
                     <label class="form-label">تعداد</label>
                     <input type="number" class="form-control" name="storage" value="{{ $product->storage }}">
                  </div>
                  <div class="form-group">
                     <label class="form-label">قیمت</label>
                     <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                  </div>
                  <div class="form-group">
                     <label class="form-label">تخفیف</label>
                     <input type="text" class="form-control" name="sale" value="{{ $product->sale }}">
                  </div>
                  <div class="form-group">
                     <label class="form-label">کاور اول</label>
                     <input type="file" class="form-control" name="cover_1">
                  </div>
                  <div class="form-group">
                     <label class="form-label">کاور دوم</label>
                     <input type="file" class="form-control" name="cover_2">
                  </div>
                  <div class="form-group">
                     <label class="form-label">گالری عکس محصول</label>
                     <input type="file" name="images[]" class="form-control" multiple>
                  </div>
                  <div class="form-group">
                     <label class="form-label">انتخاب دسته‌بندی</label>
                     <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                           @if($category->parent_id != 0)
                              <option
                                 value="{{ $category->id }}" {{ $category->parent_id = $category->id ? 'selected':'' }}>{{ $category->category }}</option>
                           @endif
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-success">ویرایش</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
