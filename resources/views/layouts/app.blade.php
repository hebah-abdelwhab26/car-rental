
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Discover your next ride with Car Rental. Explore vehicles, compare rental options, and manage your bookings with ease.">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Car Rental">
    <meta property="og:title" content="Car Rental | Explore Your Next Ride">
    <meta property="og:description" content="Explore our vehicle collection and enjoy a convenient car rental experience.">
    <meta property="og:image" content="{{ asset('images/car-rental-social.jpg') }}">
    <meta property="og:image:alt" content="Car Rental - Explore Your Next Ride">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Car Rental | Explore Your Next Ride">
    <meta name="twitter:description" content="Explore our vehicle collection and enjoy a convenient car rental experience.">
    <meta name="twitter:image" content="{{ asset('images/car-rental-social.jpg') }}">

    <title>@yield('title', 'Car Rental | Explore Your Next Ride')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <style>
        .navbar {
            padding: 10px 0;
        }

        .nav-link {
            font-weight: 500;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }

        .badge-notify {
            position: absolute;
            top: 0;
            right: -5px;
            font-size: 10px;
        }

        /* Circular icon buttons */
        .icon-circle-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 0 !important;
            position: relative;
        }

        .admin-menu .dropdown-menu {
            min-width: 260px;
        }

        .admin-menu .dropdown-item i,
        .user-menu .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        .lang-btn {
            font-weight: 500;
        }

        .notification-item {
            white-space: normal;
        }

        .notification-item small {
            display: block;
            margin-top: 4px;
        }
    </style>

    <style id="admin-dark-theme">
        /* ===== Car Rental Identity: Forest Green, Charcoal & Copper ===== */

        :root {
            --admin-bg: #111a17;
            --admin-panel: #202b25;
            --admin-border: rgba(181, 196, 175, .16);
            --admin-text: #f3f3e9;
            --admin-muted: #b3beb2;
            --admin-green: #5caa7b;
            --admin-green-dark: #347654;
            --admin-copper: #d49a70;
        }

        html {
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            color: var(--admin-text);

            background:
                radial-gradient(
                    ellipse at 8% 5%,
                    rgba(75, 130, 91, .22),
                    transparent 36%
                ),
                radial-gradient(
                    ellipse at 95% 25%,
                    rgba(190, 132, 91, .11),
                    transparent 32%
                ),
                radial-gradient(
                    ellipse at 50% 100%,
                    rgba(42, 90, 66, .15),
                    transparent 42%
                ),
                linear-gradient(
                    135deg,
                    #101815 0%,
                    #18231d 48%,
                    #121b17 100%
                ) !important;

            background-attachment: fixed !important;
        }

        body > .container,
        body > #app,
        #app {
            background: transparent !important;
        }

        main.py-4 {
            min-height: calc(100vh - 80px);
            padding-top: 30px !important;
            padding-bottom: 40px !important;
            background: transparent !important;
        }

        /* Navigation */

        .navbar {
            background: rgba(15, 23, 19, .96) !important;
            border-bottom: 1px solid var(--admin-border);
            box-shadow: 0 8px 28px rgba(0, 0, 0, .18);
            backdrop-filter: blur(14px);
        }

        .navbar .navbar-brand,
        .navbar .nav-link,
        .navbar .navbar-toggler {
            color: #f1f2e8 !important;
        }

        .navbar .nav-link:hover,
        .navbar .navbar-brand:hover {
            color: #8ed3a7 !important;
        }

        .navbar .navbar-toggler {
            border-color: var(--admin-border) !important;
        }

        /* Dropdowns */

        .dropdown-menu {
            background: #202c24 !important;
            border: 1px solid var(--admin-border) !important;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .3);
        }

        .dropdown-menu .dropdown-item {
            color: #edf2e9 !important;
        }

        .dropdown-menu .dropdown-item:hover,
        .dropdown-menu .dropdown-item:focus {
            background: rgba(92, 170, 123, .16) !important;
            color: #a8e5bb !important;
        }

        /* Cards and modals */

        .card,
        .modal-content {
            color: var(--admin-text);

            background: linear-gradient(
                145deg,
                rgba(37, 50, 42, .97),
                rgba(26, 37, 30, .98)
            ) !important;

            border: 1px solid var(--admin-border) !important;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .16);
        }

        .card-header,
        .card-footer,
        .modal-header,
        .modal-footer {
            background: rgba(255, 255, 255, .025) !important;
            border-color: var(--admin-border) !important;
        }

        .card-body {
            color: var(--admin-text);
        }

        .card-title,
        h1, h2, h3, h4, h5, h6,
        label {
            color: #f0f2e8;
        }

        .text-muted,
        .form-text,
        .mini-muted,
        .stat-label,
        .empty-box {
            color: var(--admin-muted) !important;
        }

        /* Tables */

        .table {
            --bs-table-color: #edf1e8;
            --bs-table-bg: transparent;
            --bs-table-border-color: var(--admin-border);
            --bs-table-striped-bg: rgba(255, 255, 255, .025);
            --bs-table-striped-color: #edf1e8;
            --bs-table-hover-bg: rgba(92, 170, 123, .09);
            --bs-table-hover-color: #ffffff;

            color: #edf1e8 !important;
            border-color: var(--admin-border) !important;
        }

        .table thead th {
            color: #b9e2c3 !important;
            background: rgba(92, 170, 123, .11) !important;
            border-bottom-color: var(--admin-border) !important;
        }

        .table td,
        .table th {
            border-color: var(--admin-border) !important;
        }

        .table a:not(.btn) {
            color: #91d6a8;
        }

        .table a:not(.btn):hover {
            color: #c0edcc;
        }

        /* Forms */

        .form-control,
        .form-select,
        textarea.form-control {
            color: #f0f2e8 !important;
            background-color: #17231c !important;
            border: 1px solid #405446 !important;
            border-radius: 10px;
        }

        .form-control::placeholder {
            color: #9caa9e !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--admin-green) !important;
            box-shadow: 0 0 0 .2rem rgba(92, 170, 123, .17) !important;
        }

        .form-select option {
            color: #f0f2e8;
            background: #17231c;
        }

        .form-check-input {
            background-color: #17231c;
            border-color: #627565;
        }

        .form-check-input:checked {
            background-color: var(--admin-green-dark);
            border-color: var(--admin-green);
        }

        /* Buttons */

        .btn-primary,
        .btn-success {
            color: #ffffff !important;

            background: linear-gradient(
                135deg,
                #438b60,
                #2f704b
            ) !important;

            border-color: #438b60 !important;
        }

        .btn-primary:hover,
        .btn-success:hover {
            background: linear-gradient(
                135deg,
                #56a574,
                #3b8056
            ) !important;

            border-color: #56a574 !important;
        }

        .btn-warning {
            color: #202018 !important;
        }

        .btn-outline-primary {
            color: #9edbb0 !important;
            border-color: #5caa7b !important;
        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background: #347654 !important;
        }

        /* Pagination */

        .pagination .page-link {
            color: #e7eee4;
            background: #202c24;
            border-color: var(--admin-border);
        }

        .pagination .page-link:hover {
            color: #ffffff;
            background: #304637;
        }

        .pagination .active .page-link {
            color: #ffffff;
            background: #347654;
            border-color: #438b60;
        }

        /* Alerts and separators */

        .alert {
            border-radius: 12px;
        }

        hr {
            border-color: var(--admin-border);
        }

        /* Dashboard cards */

        .dash-card {
            background: linear-gradient(
                145deg,
                rgba(42, 57, 46, .98),
                rgba(28, 41, 32, .98)
            ) !important;

            border: 1px solid rgba(170, 196, 172, .17) !important;
            border-radius: 16px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, .17);

            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }

        .dash-card:hover {
            transform: translateY(-4px);
            border-color: rgba(113, 194, 139, .48) !important;
            box-shadow: 0 16px 34px rgba(0, 0, 0, .25);
        }

        .stat-number {
            color: #ffffff !important;
        }

        .stat-label,
        .mini-muted {
            color: #bdc9bb !important;
        }

        .section-title {
            color: #dfb28b !important;
        }

        .dashboard-link {
            color: #f0f3e9 !important;
        }

        .dashboard-link:hover {
            color: #ffffff !important;
        }

        .empty-box {
            color: #bdc9bb !important;
            background: rgba(255, 255, 255, .025);
            border: 1px dashed rgba(174, 194, 173, .28);
            border-radius: 12px;
        }

        /* Preserve readability for common elements */

        .badge {
            font-weight: 600;
        }

        .modal-content .btn-close {
            filter: invert(1) grayscale(100%);
        }

        /* =========================================
           FIX: NAVBAR DROPDOWNS ABOVE DASHBOARD
        ========================================= */

        #app > nav.navbar {
            position: relative;
            z-index: 1050 !important;
            isolation: auto;
        }

        #app > nav.navbar .dropdown-menu {
            position: absolute;
            z-index: 1060 !important;
        }

        #app > nav.navbar .nav-item.dropdown {
            position: relative;
        }

        #app > nav.navbar .admin-menu .dropdown-menu,
        #app > nav.navbar .user-menu .dropdown-menu,
        #app > nav.navbar .dropdown-menu-end {
            z-index: 1060 !important;
        }

        #app > main.py-4 {
            position: relative;
            z-index: 1;
        }

        @media (max-width: 767px) {
            main.py-4 {
                padding-top: 18px !important;
            }

            .card,
            .modal-content {
                border-radius: 12px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .dash-card {
                transition: none;
            }
        }
    </style>

</head>

<body>

<div id="app">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

        <div class="container">

            <!-- BRAND -->
            <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">
                <i class="fa fa-car-side text-primary me-1"></i>
                {{ config('app.name', 'Car Rental') }}
            </a>

            <!-- TOGGLE -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- LEFT MENU -->
                <ul class="navbar-nav me-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">
                            <i class="fa fa-home me-1"></i>
                            {{ __('messages.home') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cars') }}">
                            <i class="fa fa-car me-1"></i>
                            {{ __('messages.cars') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            <i class="fa fa-circle-info me-1"></i>
                            {{ __('messages.about') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">
                            <i class="fa fa-envelope me-1"></i>
                            {{ __('messages.contact') }}
                        </a>
                    </li>

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders.index') }}">
                                    <i class="fa fa-list me-1"></i>
                                    {{ __('messages.orders') }}
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders.myReservations') }}">
                                    <i class="fa fa-list me-1"></i>
                                    {{ __('messages.my_bookings') }}
                                </a>
                            </li>
                        @endif
                    @endauth

                </ul>

                <!-- RIGHT MENU -->
                <ul class="navbar-nav ms-auto align-items-center gap-lg-2">

                    <!-- LANGUAGE MENU -->
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item dropdown me-2">

                                <a
                                    class="btn btn-outline-secondary btn-sm dropdown-toggle lang-btn"
                                    href="#"
                                    id="adminLangDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <i class="fa fa-language me-1"></i>
                                    {{ app()->getLocale() == 'ar' ? __('messages.arabic') : __('messages.english') }}
                                </a>

                                <ul
                                    class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="adminLangDropdown"
                                >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                                        >
                                            {{ __('messages.english') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                                        >
                                            {{ __('messages.arabic') }}
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endif
                    @endauth

                    <!-- ADMIN NOTIFICATIONS -->
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item dropdown me-2 position-relative">

                                <a
                                    class="nav-link icon-circle-btn border"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    title="{{ __('messages.notifications') }}"
                                >
                                    <i class="fa fa-bell"></i>

                                    @if(Auth::user()->unreadNotifications->count() > 0)
                                        <span class="badge bg-danger badge-notify">
                                            {{ Auth::user()->unreadNotifications->count() }}
                                        </span>
                                    @endif
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">

                                    @forelse(Auth::user()->unreadNotifications as $notification)

                                        @php
                                            $orderId = $notification->data['order_id'] ?? null;
                                            $message = $notification->data['message'] ?? __('messages.new_order');
                                            $carName = $notification->data['car_name'] ?? null;
                                        @endphp

                                        <li>
                                            @if($orderId)
                                                <a
                                                    class="dropdown-item notification-item"
                                                    href="{{ route('orders.notifications.redirect', $notification->id) }}"
                                                >
                                                    <div class="fw-semibold">
                                                        🚗 {{ $message }}
                                                    </div>

                                                    @if($carName)
                                                        <small class="text-muted">{{ $carName }}</small>
                                                    @endif
                                                </a>
                                            @else
                                                <span class="dropdown-item text-muted notification-item">
                                                    <div class="fw-semibold">
                                                        🚗 {{ $message }}
                                                    </div>

                                                    @if($carName)
                                                        <small class="text-muted">{{ $carName }}</small>
                                                    @endif
                                                </span>
                                            @endif
                                        </li>

                                    @empty
                                        <li>
                                            <span class="dropdown-item text-muted">
                                                {{ __('messages.no_notifications') }}
                                            </span>
                                        </li>
                                    @endforelse

                                </ul>

                            </li>
                        @endif
                    @endauth

                    <!-- USER MENU -->
                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fa fa-right-to-bracket me-1"></i>
                                {{ __('messages.login') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fa fa-user-plus me-1"></i>
                                {{ __('messages.register') }}
                            </a>
                        </li>

                    @else

                        <!-- ADMIN MENU -->
                        @if(Auth::user()->role === 'admin')

                            <li class="nav-item dropdown admin-menu">

                                <a
                                    class="nav-link icon-circle-btn border"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    title="{{ Auth::user()->name }}"
                                >
                                    <i class="fa fa-user-shield"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            <i class="fa fa-chart-line me-2"></i>
                                            {{ __('messages.dashboard') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="fa fa-user me-2"></i>
                                            {{ __('messages.profile') }}
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            <i class="fa fa-users me-2"></i>
                                            {{ __('messages.users') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('categories.index') }}">
                                            <i class="fa fa-tags me-2"></i>
                                            {{ __('messages.categories') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('locations.index') }}">
                                            <i class="fa fa-location-dot me-2"></i>
                                            {{ __('messages.locations') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('products.index') }}">
                                            <i class="fa fa-car me-2"></i>
                                            {{ __('messages.cars') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('orders.index') }}">
                                            <i class="fa fa-list me-2"></i>
                                            {{ __('messages.orders') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('payments.index') }}">
                                            <i class="fa fa-credit-card me-2"></i>
                                            {{ __('messages.payments') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('comments.index') }}">
                                            <i class="fa fa-comments me-2"></i>
                                            {{ __('messages.comments') }}
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <a
                                            class="dropdown-item text-danger"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        >
                                            <i class="fa fa-sign-out-alt me-2"></i>
                                            {{ __('messages.logout') }}
                                        </a>
                                    </li>

                                </ul>

                            </li>

                        @else

                            <!-- NORMAL USER MENU -->
                            <li class="nav-item dropdown user-menu">

                                <a
                                    class="nav-link dropdown-toggle d-flex align-items-center"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <i class="fa fa-user-circle me-2"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="fa fa-user me-2"></i>
                                            {{ __('messages.profile') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('orders.myReservations') }}">
                                            <i class="fa fa-list me-2"></i>
                                            {{ __('messages.my_reservations') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('favorites.index') }}">
                                            <i class="fa fa-heart me-2"></i>
                                            {{ __('messages.favorites') }}
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <a
                                            class="dropdown-item text-danger"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        >
                                            <i class="fa fa-sign-out-alt me-2"></i>
                                            {{ __('messages.logout') }}
                                        </a>
                                    </li>

                                </ul>

                            </li>

                        @endif

                        <form
                            id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            class="d-none"
                        >
                            @csrf
                        </form>

                    @endguest

                </ul>

            </div>

        </div>

    </nav>

    <!-- CONTENT -->
    <main class="py-4">
        @yield('content')
    </main>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- Pusher -->
<script src="https://js.pusher.com/8.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>

<script>
    window.Pusher = Pusher;

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: "{{ env('PUSHER_APP_KEY') }}",
        cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
        forceTLS: false,
        wsHost: window.location.hostname,
        wsPort: 6001
    });

    Echo.channel('admin-channel')
        .listen('.order.created', (data) => {
            console.log("NEW ORDER:", data);

            alert(
                "🚗 {{ __('messages.new_order') }}\n" +
                "{{ __('messages.user') }}: " + data.user + "\n" +
                "{{ __('messages.car') }}: " + data.car + "\n" +
                "{{ __('messages.total_price') }}: $" + data.price
            );
        });
</script>

@stack('scripts')

</body>
</html>


