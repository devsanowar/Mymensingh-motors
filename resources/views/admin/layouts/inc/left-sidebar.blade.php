@php
    $homePageRoutes = [
        'slider.*',
        'about.*',
        'promobanner.*',
        'why-choose-us.*',
        'achievement.*',
        'review.*',
        'faq.*',
        'cta.*',
    ];
    $isHomePageActive = false;
    foreach ($homePageRoutes as $route) {
        if (request()->routeIs($route)) {
            $isHomePageActive = true;
            break;
        }
    }

    $isPostActive = request()->routeIs('post.*') || request()->routeIs('post_category.*');

    $isCostActive =
        request()->routeIs('cost.*') || request()->routeIs('cost-category.*') || request()->routeIs('field-of-cost.*');

    $isIncomeActive =
        request()->routeIs('income.*') ||
        request()->routeIs('income_category.*') ||
        request()->routeIs('field_of_income.*');

    $isProductActive =
        request()->routeIs('product.*') ||
        request()->routeIs('category.*') ||
        request()->routeIs('brand.*') ||
        request()->routeIs('subcategory.*');
    $isSettingsActive = request()->routeIs('website_setting') || request()->routeIs('website_setting.update');

    $isAboutPageActive = request()->routeIs('about_page.*');
    $isOrderPageActive = request()->routeIs('order.*');
    $isDistrictPageActive = request()->routeIs('district.*');
    $isUpazilaPageActive = request()->routeIs('upazila.*');
    $isUserPageActive = request()->routeIs('user.*');
    $isPaymentMethodPageActive = request()->routeIs('payment_method.*');
    $isMessagePageActive =
        request()->routeIs('message.*') || request()->routeIs('inboxed_message') || request()->routeIs('block-list.*');
    $isShippingPageActive = request()->routeIs('shipping.*');
    $pendingOrder = App\Models\Order::where('status', 'pending')->count();
    $isPagesMenuActive =
        request()->routeIs('privacy_policy') ||
        request()->routeIs('terms_and_condtion') ||
        request()->routeIs('return_refund');

@endphp

<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset(Auth::user()->image) }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown">{{ Auth::user()->name }}</div>
            {{-- <div class="email">{{ Auth::user()->email }}</div> --}}
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            @if (Auth::user()->system_admin == 'Super_admin' || in_array('dashboard', $userPermissions))
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                </li>
            @endif

            <!-- Home Page Menu -->
            @if (Auth::user()->system_admin == 'Super_admin' || in_array('home', $userPermissions))
                <li class="{{ $isHomePageActive ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-view-headline"></i>
                        <span>Home Page</span>
                    </a>
                    <ul class="ml-menu">
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('home.slider.index', $userPermissions))
                            <li class="{{ request()->routeIs('slider.*') ? 'active' : '' }}">
                                <a href="{{ route('slider.index') }}"><span>Slider</span></a>
                            </li>
                        @endif

                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('promobanner.index', $userPermissions))
                            <li class="{{ request()->routeIs('promobanner.*') ? 'active' : '' }}">
                                <a href="{{ route('promobanner.index') }}"><span>Promo Banner</span></a>
                            </li>
                        @endif

                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('home.about.index', $userPermissions))
                            <li class="{{ request()->routeIs('about.*') ? 'active' : '' }}">
                                <a href="{{ route('about.index') }}"><span>About</span></a>
                            </li>
                        @endif

                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('home.why_chose_us.index', $userPermissions))
                            <li class="{{ request()->routeIs('why-choose-us.*') ? 'active' : '' }}">
                                <a href="{{ route('why-choose-us.index') }}"><span>Why choose us</span></a>
                            </li>
                        @endif

                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('home.cta.index', $userPermissions))
                            <li class="{{ request()->routeIs('cta.*') ? 'active' : '' }}">
                                <a href="{{ route('cta.index') }}"><span>CTA</span></a>
                            </li>
                        @endif

                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('home.achievement.index', $userPermissions))
                            <li class="{{ request()->routeIs('achievement.*') ? 'active' : '' }}">
                                <a href="{{ route('achievement.index') }}"><span>Achievement</span></a>
                            </li>
                        @endif

                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('home.review.index', $userPermissions))
                            <li class="{{ request()->routeIs('review.*') ? 'active' : '' }}">
                                <a href="{{ route('review.index') }}"><span>Review</span></a>
                            </li>
                        @endif

                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('home.faq.index', $userPermissions))
                            <li class="{{ request()->routeIs('faq.*') ? 'active' : '' }}">
                                <a href="{{ route('faq.index') }}"><span>FAQ</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('about', $userPermissions))
                <li class="{{ $isAboutPageActive ? 'active' : '' }}">
                    <a href="{{ route('about_page.page') }}">
                        <i class="zmdi zmdi-assignment"></i><span>About Page</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->system_admin == 'Super_admin' || in_array('product', $userPermissions))
                <li class="{{ $isProductActive ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle"> <i class="zmdi zmdi-shopping-cart"></i>
                        <span>Product</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->routeIs('product.create') ? 'active' : '' }}">
                            <a href="{{ route('product.create') }}">Add Product</a>
                        </li>
                        <li class="{{ request()->routeIs('product.index') ? 'active' : '' }}">
                            <a href="{{ route('product.index') }}">All Product</a>
                        </li>
                        <li class="{{ request()->routeIs('category.*') ? 'active' : '' }}">
                            <a href="{{ route('category.index') }}">Category</a>
                        </li>
                        {{-- <li class="{{ request()->routeIs('subcategory.*') ? 'active' : '' }}">
                        <a href="{{ route('subcategory.index') }}">Sub Category</a>
                    </li> --}}
                        <li class="{{ request()->routeIs('brand.*') ? 'active' : '' }}">
                            <a href="{{ route('brand.index') }}">Brand</a>
                        </li>

                        <li class="{{ request()->routeIs('brand.*') ? 'active' : '' }}">
                            <a href="{{ route('product_unit.index') }}">Product unit</a>
                        </li>

                    </ul>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('stock', $userPermissions))
                <li class="{{ $isPostActive ? 'active open' : '' }}">
                    <a href="{{ route('admin.stock.index') }}">
                        <i class="fa-solid fa-chart-column"></i>
                        <span>Stock Management</span>
                    </a>
                </li>
            @endif


            @if (Auth::user()->system_admin == 'Super_admin' || in_array('cost', $userPermissions))
                <li class="">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-accounts"></i>
                        <span>Supplier</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->routeIs('supplier.index') ? 'active' : '' }}">
                            <a href="{{ route('supplier.index') }}">All Supplier</a>
                        </li>
                        {{-- <li class="{{ request()->routeIs('field-of-cost.index') ? 'active' : '' }}">
                            <a href="{{ route('field-of-cost.index') }}">Field Of Cost</a>
                        </li> --}}
                    </ul>
                </li>
            @endif



            @if (Auth::user()->system_admin == 'Super_admin' || in_array('cost', $userPermissions))
                <li class="{{ $isCostActive ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-border-color"></i>
                        <span>Cost</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->routeIs('cost-category.index') ? 'active' : '' }}">
                            <a href="{{ route('cost-category.index') }}">Cost Category</a>
                        </li>
                        <li class="{{ request()->routeIs('field-of-cost.index') ? 'active' : '' }}">
                            <a href="{{ route('field-of-cost.index') }}">Field Of Cost</a>
                        </li>

                        <li class="{{ request()->routeIs('cost.create') ? 'active' : '' }}">
                            <a href="{{ route('cost.create') }}">Add Cost</a>
                        </li>

                        <li class="{{ request()->routeIs('cost.index') ? 'active' : '' }}">
                            <a href="{{ route('cost.index') }}">All Cost</a>
                        </li>

                    </ul>
                </li>
            @endif


            @if (Auth::user()->system_admin == 'Super_admin' || in_array('income', $userPermissions))
                <li class="{{ $isIncomeActive ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-border-color"></i>
                        <span>Income</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->routeIs('income_category.index') ? 'active' : '' }}">
                            <a href="{{ route('income_category.index') }}">Income Category</a>
                        </li>

                        <li class="{{ request()->routeIs('field_of_income.index') ? 'active' : '' }}">
                            <a href="{{ route('field_of_income.index') }}">Field Of Income</a>
                        </li>

                        <li class="{{ request()->routeIs('income.create') ? 'active' : '' }}">
                            <a href="{{ route('income.create') }}">Add Income</a>
                        </li>

                        <li class="{{ request()->routeIs('income.index') ? 'active' : '' }}">
                            <a href="{{ route('income.index') }}">All Income</a>
                        </li>
                    </ul>
                </li>
            @endif




            @if (Auth::user()->system_admin == 'Super_admin' || in_array('shipping', $userPermissions))
                <li class="{{ $isShippingPageActive ? 'active' : '' }}">
                    <a href="{{ route('shipping.index') }}"><i class="zmdi zmdi-money-box"></i>
                        <span>Shipping</span>
                    </a>
                </li>
            @endif




            {{-- District Menu --}}
            @if (Auth::user()->system_admin == 'Super_admin' || in_array('district.index', $userPermissions))
                <li class="{{ $isDistrictPageActive ? 'active' : '' }}">
                    <a href="{{ route('district.index') }}"><i class="zmdi zmdi-map"></i><span>District</span></a>
                </li>
            @endif

            {{-- upazila Menu --}}
            @if (Auth::user()->system_admin == 'Super_admin' || in_array('upazila.index', $userPermissions))
                <li class="{{ $isUpazilaPageActive ? 'active' : '' }}">
                    <a href="{{ route('upazila.index') }}"><i class="zmdi zmdi-map"></i><span>Upazila</span></a>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('orders', $userPermissions))
                <li class="{{ $isOrderPageActive ? 'active' : '' }}">
                    <a href="{{ route('order.index') }}"><i class="zmdi zmdi-shopping-cart"></i><span>Orders <span
                                class="order-count">{{ $pendingOrder }}</span></span></a>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('payment_method', $userPermissions))
                <li class="{{ $isPaymentMethodPageActive ? 'active' : '' }}">
                    <a href="{{ route('payment_method.index') }}"><i class="zmdi zmdi-money"></i><span>Payment
                            Method</span></a>
                </li>
            @endif

            {{-- Post Menu --}}
            @if (Auth::user()->system_admin == 'Super_admin' || in_array('post', $userPermissions))
                <li class="{{ $isPostActive ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-border-color"></i>
                        <span>Post</span>
                    </a>
                    <ul class="ml-menu">
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('post_category.index', $userPermissions))
                            <li class="{{ request()->routeIs('post_category.index') ? 'active' : '' }}">
                                <a href="{{ route('post_category.index') }}">Category</a>
                            </li>
                        @endif

                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('post.create', $userPermissions))
                            <li class="{{ request()->routeIs('post.create') ? 'active' : '' }}">
                                <a href="{{ route('post.create') }}">Add Post</a>
                            </li>
                        @endif
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('post.index', $userPermissions))
                            <li class="{{ request()->routeIs('post.index') ? 'active' : '' }}">
                                <a href="{{ route('post.index') }}">All Post</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Only Admin can see Users Menu --}}
            @if (Auth::user()->system_admin == 'Super_admin' || in_array('users', $userPermissions))
                <li class="{{ $isUserPageActive ? 'active' : '' }}">
                    <a href="{{ route('user.create') }}"><i class="zmdi zmdi-accounts"></i><span>Users</span></a>
                </li>
            @endif


            @if (Auth::user()->system_admin == 'Super_admin' || in_array('sms', $userPermissions))
                <li class="{{ Request::is('moblieSMS*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-email"></i><span>SMS</span>
                    </a>
                    <ul class="ml-menu">
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('sms.send', $userPermissions))
                            <li class="{{ Request::is('moblieSMS/sms') ? 'active' : '' }}">
                                <a href="{{ route('message.index') }}">Send SMS</a>
                            </li>
                        @endif
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('sms.custom', $userPermissions))
                            <li class="{{ Request::is('moblieSMS/custom-sms') ? 'active' : '' }}">
                                <a href="{{ route('custom.sms') }}">Custom SMS</a>
                            </li>
                        @endif
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('sms.report', $userPermissions))
                            <li class="{{ Request::is('moblieSMS/sms-report') ? 'active' : '' }}">
                                <a href="{{ route('sms-report.index') }}">SMS Report</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Shared: Inbox, Settings, Logout --}}


            @if (Auth::user()->system_admin == 'Super_admin' || in_array('subscribers', $userPermissions))
                <li class="{{ request()->routeIs('newslatter') ? 'active' : '' }}">
                    <a href="{{ route('newslatter') }}"><i class="zmdi zmdi-accounts"></i>
                        <span>Subscriber</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('messages', $userPermissions))
                <li class="{{ $isMessagePageActive ? 'active' : '' }}">
                    <a href="{{ route('contact_form.message') }}"><i class="zmdi zmdi-email-open"></i>
                        <span>Messages</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('blocklist', $userPermissions))
                <li class="{{ request()->routeIs('block-list.*') ? 'active' : '' }}">
                    <a href="{{ route('block.list') }}"><i class="zmdi zmdi-accounts"></i>
                        <span>Account Block Lists</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('pages', $userPermissions))
                <li class="{{ $isPagesMenuActive ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-folder"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="ml-menu">
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('privacy_policy', $userPermissions))
                            <li class="{{ request()->routeIs('privacy_policy') ? 'active' : '' }}">
                                <a href="{{ route('privacy_policy') }}">Privacy Policy</a>
                            </li>
                        @endif
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('terms_and_condtion', $userPermissions))
                            <li class="{{ request()->routeIs('terms_and_condtion') ? 'active' : '' }}">
                                <a href="{{ route('terms_and_condtion') }}">Terms And Condition</a>
                            </li>
                        @endif
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('return_refund', $userPermissions))
                            <li class="{{ request()->routeIs('return_refund') ? 'active' : '' }}">
                                <a href="{{ route('return_refund') }}">Return & Refund</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('settings', $userPermissions))
                <li
                    class="{{ request()->routeIs('sms-settings.*') || request()->routeIs('website_setting') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-settings"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('sms-settings.edit', $userPermissions))
                            <li class="{{ request()->routeIs('sms-settings.*') ? 'active' : '' }}">
                                <a href="{{ route('sms-settings.edit') }}">
                                    <span>SMS API Settings</span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->system_admin == 'Super_admin' || in_array('website_setting', $userPermissions))
                            <li class="{{ request()->routeIs('website_setting') ? 'active' : '' }}">
                                <a href="{{ route('website_setting') }}">Website Setting</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('accessinfo', $userPermissions))
                <li class="{{ request()->routeIs('visit.log.index.*') ? 'active' : '' }}">
                    <a href="{{ route('visit.log.index') }}"><i class="zmdi zmdi-accounts"></i>
                        <span>Access Info</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->system_admin == 'Super_admin' || in_array('privilege', $userPermissions))
                <li class="{{ request()->routeIs('visit.log.index.*') ? 'active' : '' }}">
                    <a href="{{ route('privilege.index') }}"><i class="zmdi zmdi-settings"></i>
                        <span>Privilege</span>
                    </a>
                </li>
            @endif


            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="zmdi zmdi-power"></i><span>Logout</span>
                    </a>
                </form>
            </li>
        </ul>

    </div>
    <!-- #Menu -->
</aside>
