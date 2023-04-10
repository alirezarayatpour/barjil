<h6>حساب کاربری</h6>
<hr>
<ul class="my-account-list">
    <li>
        <a href="{{ route('pages.my-account') }}"
            class="{{ Request::route()->getName() == 'pages.my-account' ? 'active' : '' }}">پیشخوان</a>
    </li>
    <li>
        <a href="{{ route('pages.edit-account') }}"
        class="{{ Request::route()->getName() == 'pages.edit-account' ? 'active' : '' }}">جزئیات حساب</a>
    </li>
    <li>
        <a href="{{ route('pages.my-orders') }}"
        class="{{ Request::route()->getName() == 'pages.my-orders' ? 'active' : '' }}">سفارشات من</a>
    </li>
    {{-- <li>
        <a href="">چت</a>
    </li> --}}
    <li>
        <a href="{{ route('logout') }}" class=""
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            خروج
        </a>
    </li>
</ul>
