{{--! aside --}}
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('index') }}" aria-expanded="false">
                        <i class="bi bi-speedometer"></i>
                        <span class="hide-menu">داشبورد</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('category.index') }}" aria-expanded="false">
                        <i class="bi bi-bookmark-fill"></i>
                        <span class="hide-menu">دسته‌بندی‌ها</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
                        <i class="bi bi-bag-plus-fill"></i>
                        <span class="hide-menu">محصولات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('blog.index') }}" aria-expanded="false">
                        <i class="bi bi-card-text"></i>
                        <span class="hide-menu">وبلاگ</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('contact.index') }}" aria-expanded="false">
                        <i class="bi bi-info-square"></i>
                        <span class="hide-menu">اطلاعات تماس</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('job.index') }}" aria-expanded="false">
                        <i class="fa fa-tasks"></i>
                        <span class="hide-menu">درخواست همکاری</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                        <i class="bi bi-people"></i>
                        <span class="hide-menu">مدیریت کاربران</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('organization.index') }}" aria-expanded="false">
                        <i class="bi bi-building"></i>
                        <span class="hide-menu">سفارشات سازمانی</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('ask.index') }}" aria-expanded="false">
                        <i class="bi bi-question-diamond-fill"></i>
                        <span class="hide-menu">سوالات کاربران</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('comment.index') }}" aria-expanded="false">
                        <i class="fa fa-comment"></i>
                        <span class="hide-menu">مدیریت نظرات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('order.index') }}" aria-expanded="false">
                        <i class="bi bi-truck"></i>
                        <span class="hide-menu">سفارشات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="bi bi-kanban"></i>
                        <span class="hide-menu">مدیریت صفحات</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('faq.index') }}" class="sidebar-link">
                                <i class="bi bi-question-circle"></i>
                                <span class="hide-menu"> پرسش‌های متداول </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('aboutUs.index') }}" class="sidebar-link">
                                <i class="bi bi-file-earmark-person"></i>
                                <span class="hide-menu"> درباره ما </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('term.index') }}" class="sidebar-link">
                                <i class="fa fa-gavel"></i>
                                <span class="hide-menu"> قوانین و مقررات </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="bi bi-gear"></i>
                        <span class="hide-menu">تنظیمات فروشگاه</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('logo.index') }}" class="sidebar-link">
                                <i class="bi bi-circle-fill"></i>
                                <span class="hide-menu"> لوگو </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('banner.index') }}" class="sidebar-link">
                                <i class="bi bi-circle-fill"></i>
                                <span class="hide-menu"> بنرهای صفحه اصلی </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('social.index') }}" class="sidebar-link">
                                <i class="bi bi-circle-fill"></i>
                                <span class="hide-menu"> شبکه‌های اجتماعی </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('footerColumns.index') }}" class="sidebar-link">
                                <i class="bi bi-circle-fill"></i>
                                <span class="hide-menu"> عنوان ستون‌های Footer </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('footerItem.index') }}" class="sidebar-link">
                                <i class="bi bi-circle-fill"></i>
                                <span class="hide-menu"> آیتم‌های ستون‌های Footer </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('footerText.index') }}" class="sidebar-link">
                                <i class="bi bi-circle-fill"></i>
                                <span class="hide-menu"> متن Footer </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="hide-menu">خروج</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
{{--! /aside --}}
