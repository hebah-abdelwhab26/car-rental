<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'CarBook') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* =========================
           NAVBAR
        ========================== */
        /* تثبيت الناف بار في أعلى الصفحة بدون فراغ */
#ftco-navbar {
    position: sticky;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99999;
    background: #000 !important;
    margin-top: 0 !important;
    padding-top: 12px;
    padding-bottom: 12px;
}

/* منع أي عنصر من الظهور فوق الناف بار */
.hero-wrap,
.ftco-section,
.owl-carousel,
.owl-stage-outer,
.ftco-intro,
.ftco-about,
.testimony-section,
.blog-entry,
.car-wrap {
    position: relative;
    z-index: 1;
}

/* اجعل الدروب داون فوق كل شيء */
#ftco-navbar .dropdown-menu {
    z-index: 999999 !important;
}

/* إزالة أي فراغ علوي عام من الصفحة */
html, body {
    margin: 0 !important;
    padding: 0 !important;
}

/* أحياناً القالب يضيف مسافة عند أول سيكشن */
.hero-wrap:first-of-type {
    margin-top: 0 !important;
    padding-top: 0 !important;
}
        #ftco-navbar {
            background: #000 !important;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        #ftco-navbar .navbar-brand {
            color: #fff !important;
            font-weight: 700;
            font-size: 24px;
        }

        #ftco-navbar .navbar-brand span {
            color: #01d28e !important;
        }

        #ftco-navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: .3s;
        }

        #ftco-navbar .nav-link:hover,
        #ftco-navbar .nav-item.active .nav-link {
            color: #01d28e !important;
        }

        #ftco-navbar .navbar-toggler {
            color: #fff !important;
            border-color: rgba(255,255,255,.25) !important;
        }

        #ftco-navbar .navbar-toggler .oi {
            color: #fff !important;
        }

        /* =========================
           RIGHT ACTIONS
        ========================== */
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 18px;
        }

        .navbar-icon-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.18);
            background: rgba(255,255,255,.08);
            color: #fff !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: all .25s ease;
            text-decoration: none !important;
            padding: 0;
            cursor: pointer;
        }

        .navbar-icon-btn i {
            color: #fff !important;
            font-size: 18px;
            line-height: 1;
        }

        .navbar-icon-btn:hover,
        .navbar-icon-btn:focus {
            background: #01d28e !important;
            border-color: #01d28e !important;
            color: #fff !important;
            transform: translateY(-1px);
            text-decoration: none !important;
        }

        /* =========================
           DROPDOWN
        ========================== */
        #ftco-navbar .dropdown-menu {
            background: #111 !important;
            border: 1px solid #222 !important;
            min-width: 240px;
            border-radius: 12px;
            margin-top: 12px;
            padding: 8px;
            box-shadow: 0 12px 28px rgba(0,0,0,.25);
        }

        #ftco-navbar .dropdown-item {
            color: #fff !important;
            border-radius: 8px;
            padding: 10px 12px;
            transition: .2s;
            display: flex;
            align-items: center;
        }

        #ftco-navbar .dropdown-item:hover,
        #ftco-navbar .dropdown-item:focus {
            background: #222 !important;
            color: #01d28e !important;
        }

        #ftco-navbar .dropdown-divider {
            border-color: rgba(255,255,255,.08);
        }

        .dropdown-menu .text-muted {
            color: #bbb !important;
        }

        /* زر اللغة */
        .lang-btn {
            height: 42px;
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,.2) !important;
            color: #fff !important;
            background: rgba(255,255,255,.08) !important;
            padding: 0 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: none !important;
        }

        .lang-btn:hover,
        .lang-btn:focus {
            background: #01d28e !important;
            border-color: #01d28e !important;
            color: #fff !important;
            box-shadow: none !important;
            text-decoration: none !important;
        }

        /* إخفاء السهم الافتراضي */
        .user-toggle::after,
        .lang-btn::after {
            display: none !important;
        }

        /* تثبيت مكان القائمة */
        #ftco-navbar .dropdown-menu.dropdown-menu-right {
            right: 0;
            left: auto;
        }

        /* مهم: منع أي hover من القالب من إظهار/إخفاء القائمة */
        #ftco-navbar .dropdown:hover > .dropdown-menu {
            display: none;
        }

        #ftco-navbar .dropdown.show > .dropdown-menu {
            display: block !important;
        }

        /* Mobile */
        @media (max-width: 991.98px) {
            .navbar-actions {
                margin-left: 0;
                margin-top: 15px;
                flex-wrap: wrap;
            }

            #ftco-navbar .navbar-nav {
                align-items: flex-start !important;
            }
        }
    </style>
</head>
<body class="">

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark mt-0 ftco-navbar-light" id="ftco-navbar">
    <div class="container">

        {{-- BRAND --}}
        <a class="navbar-brand" href="{{ route('welcome') }}">
            Car<span>Book</span>
        </a>

        {{-- TOGGLER --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">

            {{-- MAIN MENU --}}
            <ul class="navbar-nav ml-auto align-items-lg-center">
                <li class="nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}">
                    <a href="{{ route('welcome') }}" class="nav-link">{{ __('messages.home') }}</a>
                </li>

                <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}" class="nav-link">{{ __('messages.about') }}</a>
                </li>

                <li class="nav-item {{ request()->routeIs('services') ? 'active' : '' }}">
                    <a href="{{ route('services') }}" class="nav-link">{{ __('messages.services') }}</a>
                </li>

                <li class="nav-item {{ request()->routeIs('pricing') ? 'active' : '' }}">
                    <a href="{{ route('pricing') }}" class="nav-link">{{ __('messages.pricing') }}</a>
                </li>

                <li class="nav-item {{ request()->routeIs('cars') || request()->routeIs('cars.show') ? 'active' : '' }}">
                    <a href="{{ route('cars') }}" class="nav-link">{{ __('messages.cars') }}</a>
                </li>

                <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}" class="nav-link">{{ __('messages.contact') }}</a>
                </li>
            </ul>

            {{-- RIGHT ACTIONS --}}
            <div class="navbar-actions ml-lg-3">

                {{-- LANGUAGE --}}
                <div class="dropdown" id="langDropdownWrap">
                    <a class="btn lang-btn dropdown-toggle"
                       href="#"
                       id="languageDropdown"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <i class="icon-globe"></i>
                        {{ app()->getLocale() == 'ar' ? 'العربية' : 'English' }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                            English
                        </a>
                        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                            العربية
                        </a>
                    </div>
                </div>

                @auth
                    {{-- FAVORITES --}}
                    <a href="{{ route('favorites.index') }}"
                       class="navbar-icon-btn"
                       title="{{ __('messages.favorites') }}">
                        <i class="icon-heart"></i>
                    </a>

                    {{-- USER MENU --}}
                    <div class="dropdown" id="userDropdownWrap">
                        <a href="#"
                           class="navbar-icon-btn user-toggle"
                           id="userDropdown"
                           role="button"
                           aria-haspopup="true"
                           aria-expanded="false"
                           title="{{ auth()->user()->name }}">
                            <i class="icon-user"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            @if(auth()->user()->role === 'admin')
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="icon-speedometer mr-2"></i> Dashboard
                                </a>

                                <a class="dropdown-item" href="{{ route('orders.index') }}">
                                    <i class="icon-list mr-2"></i> {{ __('messages.orders') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('payments.index') }}">
                                    <i class="icon-credit-card mr-2"></i> {{ __('messages.payments') }}
                                </a>

                                {{-- COMMENTS داخل القائمة --}}
                                <a class="dropdown-item" href="{{ route('comments.index') }}">
                                   <i class="ion-ios-chatboxes mr-2"></i> {{ __('messages.comments') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                    <i class="icon-people mr-2"></i> {{ __('messages.users') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('categories.index') }}">
                                    <i class="icon-tag mr-2"></i> {{ __('messages.categories') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('locations.index') }}">
                                    <i class="icon-map-marker mr-2"></i> {{ __('messages.locations') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('products.index') }}">
                                    <i class="icon-car mr-2"></i> {{ __('messages.cars') }}
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('orders.myReservations') }}">
                                    <i class="icon-list mr-2"></i> {{ __('messages.my_reservations') }}
                                </a>

                                {{-- COMMENTS داخل القائمة --}}
                                <a class="dropdown-item" href="{{ route('comments.index') }}">
                                    <i class="ion-ios-chatboxes mr-2"></i> {{ __('messages.comments') }}
                                </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="icon-user mr-2"></i> {{ __('messages.profile') }}
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item text-danger"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-log-out mr-2"></i> {{ __('messages.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light">
                        {{ __('messages.login') }}
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-primary">
                        {{ __('messages.register') }}
                    </a>
                @endauth

            </div>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script>
    $(function () {
        // إلغاء أي فتح/إغلاق قد يسببه القالب
        $('#languageDropdown, #userDropdown').off('mouseenter mouseleave click');
        $('#langDropdownWrap, #userDropdownWrap').off('mouseenter mouseleave');

        function closeAllDropdowns() {
            $('#langDropdownWrap, #userDropdownWrap').removeClass('show');
            $('#langDropdownWrap .dropdown-menu, #userDropdownWrap .dropdown-menu').removeClass('show').hide();
            $('#languageDropdown, #userDropdown').attr('aria-expanded', 'false');
        }

        // إغلاق مبدئي ثم إظهار فقط عند الضغط
        closeAllDropdowns();

        $('#languageDropdown').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const wrap = $('#langDropdownWrap');
            const menu = wrap.find('.dropdown-menu');
            const isOpen = wrap.hasClass('show');

            closeAllDropdowns();

            if (!isOpen) {
                wrap.addClass('show');
                menu.addClass('show').show();
                $(this).attr('aria-expanded', 'true');
            }
        });

        $('#userDropdown').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const wrap = $('#userDropdownWrap');
            const menu = wrap.find('.dropdown-menu');
            const isOpen = wrap.hasClass('show');

            closeAllDropdowns();

            if (!isOpen) {
                wrap.addClass('show');
                menu.addClass('show').show();
                $(this).attr('aria-expanded', 'true');
            }
        });

        // منع إغلاق القائمة عند الضغط داخلها
        $('#langDropdownWrap .dropdown-menu, #userDropdownWrap .dropdown-menu').on('click', function (e) {
            e.stopPropagation();
        });

        // إغلاق عند الضغط خارجها
        $(document).on('click', function () {
            closeAllDropdowns();
        });
    });
</script>

@stack('scripts')

</body>
</html>
