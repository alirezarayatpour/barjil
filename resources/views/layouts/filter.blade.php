<div class="filter-box-all">
    <div class="border-filter">
        <a href="javascript:void(0)" class="filter-phone-close"><i class="fa fa-window-close ms-2"></i>بستن</a>
        <h6 class="filter-exist">فیلتر موجودی</h6>
        <div class="filter-box">
            <input type="checkbox" value="تخفیف دار" id="onsale" rel="onsale" class="onsale" onchange="change()">
            <label for="onsale">محصولات تخفیف‌دار</label>
        </div>
        <div class="filter-box">
            <input type="checkbox" value="موجود" id="exist" rel="exist" class="exist" onchange="change()">
            <label for="exist">محصولات موجود</label>
        </div>
    </div>

    <div class="border-filter mt-4">
        <h6 class="filter-exist">فیلتر براساس قیمت</h6>
{{--        <div class="slider"></div>--}}

{{--        <div class="range-orange-box">--}}
{{--            <input type="range" class="range-orange">--}}
{{--        </div>--}}

{{--        <div class="filter-box-1">--}}
{{--            <span class="text-black">قیمت:</span>--}}
{{--            <span>0 تومان - 3,000,000 تومان</span>--}}
{{--            <span>--}}
{{--                <button class="filter-button">فیلتر</button>--}}
{{--            </span>--}}
{{--        </div>--}}

    </div>

    <div class="border-filter mt-4 position-relative">
        <h6 class="filter-exist">دسته‌بندی محصولات</h6>

        <ul class="range-orange-box">
            @foreach($categories as $category)
                <li class="product-category-item">
                    <a href="#">{{ $category->category }}</a>
                    <span class="product-arrow" role="button"><i class="fas fa-angle-down"></i></span>
                    <ul class="me-3 more-product-category" style="display: none;">
                        @foreach($parameters as $parameter)
                            @if($category->id == $parameter->parent_id)
                                <li class="product-category-item"><a href="{{ route('pages.product-category', $parameter->id) }}">{{ $parameter->category }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

    </div>
</div>
<a href="javascript:void(0)" class="filter-phone"><i class="fa fa-bars ms-2"></i>مشاهده فیلترها</a>
