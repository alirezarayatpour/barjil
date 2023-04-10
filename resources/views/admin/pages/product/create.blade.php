@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label class="form-label">عنوان</label>
                     <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}" placeholder="عنوان محصول را وارد کنید">
                     @error('title')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">توضیحات محصول</label>
                     <textarea id="mytextarea" name="description" class="@error('description') is-invalid @enderror">
                            {{ old('description') }}
                            </textarea>
                     @error('description')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">تعداد</label>
                     <input type="number" class="form-control @error('storage') is-invalid @enderror" name="storage"
                            value="{{ old('storage') }}" placeholder="تعداد محصول را وارد کنید">
                     @error('storage')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">قیمت</label>
                     <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            value="{{ old('price') }}" placeholder="قیمت محصول را وارد کنید">
                     @error('price')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">تخفیف</label>
                     <input type="text" class="form-control @error('sale') is-invalid @enderror" name="sale"
                            value="{{ old('sale') }}" placeholder="تخفیف محصول را وارد کنید">
                     @error('sale')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">کاور اول</label>
                     <input type="file" class="form-control @error('cover_1') is-invalid @enderror" name="cover_1">
                     @error('cover_1')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">کاور دوم</label>
                     <input type="file" class="form-control @error('cover_2') is-invalid @enderror" name="cover_2">
                     @error('cover_2')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">گالری عکس محصول</label>
                     <input type="file" name="images[]" class="form-control" multiple>
                     {{-- @error('images[]')
                         <span class="text-danger">{{ $message }}</span>
                     @enderror --}}
                  </div>

                  <div class="form-group">
                     <select name="category_id" id="category_id"
                             class="form-control @error('category_id') is-invalid @enderror">
                        <label class="form-label">انتخاب دسته‌بندی</label>
                        <option disabled selected>انتخاب دسته‌بندی</option>
                        @foreach($categories as $category)
                           @if($category->parent_id != 0)
                              <option value="{{ $category->id }}">{{ $category->category }}</option>
                           @endif
                        @endforeach
                     </select>
                     @error('category_id')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-success">ایجاد</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
