{{--! Header --}}
<div class="container-fluid" style="background-color: white; border-bottom: 1px solid #f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-4 d-block d-xl-none d-lg-none">
                <div class="open-nav-menu">
                    <span></span>
                </div>
            </div>
            <div class="col-xl-1 col-4 py-2 everything-center">
                <a href="{{ route('pages.index') }}">خانه</a>
                @foreach($logos as $logo)
                    @if($logo->position == 'منو بالا' and $logo->status == 1)
                        <a href="{{ route('pages.index') }}">
                            <img src="{{ asset('image/logo').'/'.$logo->image }}" alt="barjil" class="img-fluid logo">
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="col-xl-9 d-xl-block d-lg-block d-md-none d-none" style="margin-top: 30px;">
                <form action="{{ route('pages.search') }}" method="GET">
                    <div class="d-flex">
                        <div style="width: 70%;">
                            <input type="search" class="search-bar" name="product" placeholder="جستجوی محصولات" />
                        </div>
                        <div style="width: 20%;">

                            <select name="category" class="btn choose-category">
                                <option value="ALL" {{ request('category') == "ALL" ? 'selected' : ''}}>انتخاب دسته‌بندی</option>
                                @foreach($categories as $category)
{{--                                    <option value="{{ $category->id }}" {{request('category') == $category->id ? 'selected' : ''}}>{{ $category->category }}</option>--}}
                                    <option value="{{ $category->id }}" >{{ $category->category }}</option>
                                    @foreach($parameters as $parameter)
                                        @if($category->id == $parameter->parent_id)
{{--                                            <option value="{{ $parameter->id }}" {{request('category') == $parameter->id ? 'selected' : ''}} style="font-size: 12px;">{{ $parameter->category }}</option>--}}
                                            <option value="{{ $parameter->id }}" style="font-size: 12px;">{{ $parameter->category }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>

                        </div>
                        <div>
                            <button class="search-bar-btn">
                                <i class="fa fa-search text-white"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-2 col-4 everything-center">
                <div class="cart-div">
                    <a href="#" class="cart-button cart-btn">
                        <span class="px-1"><i class="fa fa-shopping-bag"></i></span>
                        <span class="cart-text">{{ number_format($totalPrice) }} تومان</span>
                    </a>
                </div>
                <div class="cart-div">
                    @if(Auth::user())
                        <a href="{{ route('pages.my-account') }}" class="cart-button">
                            <span class="px-1"><i class="fa fa-user"></i></span>
                            <span class="cart-text">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="shadow-lg drop-profile">
                            <ul>
                                <li>
                                    <a href="{{ route('pages.edit-account') }}" class="cart-button">
                                        جزئیات حساب
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('pages.my-orders') }}"  class="cart-button">
                                        سفارشات من
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="cart-button"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        خروج
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="cart-button">
                            <span class="px-1"><i class="fa fa-user"></i></span>
                            <span class="cart-text">ورود / ثبت نام</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cart-shopping">
    <div class="d-flex">
        <div class="basket-text"><h4>سبد خرید</h4></div>
        <div class="basket-close" role="button"><i class="fa fa-window-close"></i> بستن (ESC)</div>
    </div>
    <hr/>
    @foreach($cart as $item)
        <a href="{{ route('pages.product', $item->product->id) }}" class="link-product">
            <div style="width: 90%;" class="ms-auto me-auto mb-4 p-2 cart-shopping-effect">
                <div class="d-flex">
                    <div class="w-25">
                        <img src="{{ asset('image/cover_1').'/'.$item->product->cover_1 }}" alt="" width="60px" height="50px" class="img-fluid">
                    </div>
                    <div class="w-50">
                        <div>{{ $item->product->title }}</div>
                        <div class="orange">{{ number_format($item->product->price) }}<span class="silver ms-2">x{{ $item->count }}</span> تومان</div>
                    </div>
                    <div class="w-25 text-start">
                        <form action="{{ route('cart-remove', $item->id) }}" method="POST">
                            @csrf
                            <button class="no-button-style"><i class="bi bi-x"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
{{--    <div style="width: 90%; bottom: 0; left: 0" class="ms-auto me-auto">--}}
        <div class="" style="position: absolute; bottom: 5%; left: 5%; width: 90%;">
            <table class="table" style="border: 0 solid transparent">
                <tr>
                    <td>جمع کل سبد خرید:</td>
                    <td class="text-start orange">{{ number_format($totalPrice) }} تومان</td>
                </tr>
            </table>
            <a href="{{ route('cart') }}" class="btn business d-block py-2">مشاهده سبد خرید</a>
            <a href="{{ route('checkout') }}" class="btn business d-block py-2 mt-3">تسویه حساب</a>
        </div>
{{--    </div>--}}
</div>
<div class="back-close"></div>

<div class="container-fluid" style="background-color: white; border-bottom: 1px solid #f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-xl-10">

                <header class="header">
                    <div class="container">
                        <div class="header-main">

                            <div class="menu-overlay"></div>
                            <!-- navigation menu start -->
                            <nav class="nav-menu">
                                <div class="close-nav-menu"></div>
                                <ul class="menu">

                                    @foreach($categories as $category)
                                        <li class="menu-item menu-item-has-children">
                                            <a href="{{ route('pages.product-category', $category->id) }}" data-toggle="sub-menu">
                                                {{ $category->category }}<i class="fas fa-angle-down angle"></i>
                                            </a>
                                            <ul class="sub-menu">
                                                @foreach($parameters as $parameter)
                                                    @if($category->id == $parameter->parent_id)
                                                        <li class="menu-item">
                                                            <a href="{{ route('pages.product-category', $parameter->id) }}">
                                                                {{ $parameter->category }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach

                                </ul>
                            </nav>
                            <!-- navigation menu end -->
                        </div>
                    </div>
                </header>

            </div>
            <div class="col-xl-2 col-12 text-xl-start text-lg-start text-md-center text-center mt-1">
                <a href="{{ route('pages.business') }}" class="btn business py-2 px-4">خدمات کسب و کارها</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid d-xl-none d-lg-none" style="background-color: white;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tablet-menu">
                    <ul class="d-flex">

                        <li>
                            <a href="{{ route('pages.all-products') }}">
                                <i class="fa fa-home"></i>
                                <div>فروشگاه</div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="cart-btn">
                                <i class="fa fa-shopping-bag"></i>
                                <div>سبد خرید</div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('login') }}">
                                <i class="fa fa-user"></i>
                                <div>حساب کاربری من</div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-search"></i>
                                <div>جستجو</div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{--! /Header --}}
