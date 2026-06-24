<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Car Rental') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <style>
        .navbar{
            padding: 10px 0;
        }

        .nav-link{
            font-weight: 500;
        }

        .nav-link:hover{
            color: #0d6efd !important;
        }

        .badge-notify{
            position: absolute;
            top: 0;
            right: -5px;
            font-size: 10px;
        }

        /* زر أيقونة دائري */
        .icon-circle-btn{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 0 !important;
            position: relative;
        }

        .admin-menu .dropdown-menu{
            min-width: 260px;
        }

        .admin-menu .dropdown-item i,
        .user-menu .dropdown-item i{
            width: 20px;
            text-align: center;
        }

        .lang-btn{
            font-weight: 500;
        }

        .notification-item{
            white-space: normal;
        }

        .notification-item small{
            display: block;
            margin-top: 4px;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- LEFT MENU -->
                <ul class="navbar-nav me-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">
                            <i class="fa fa-home me-1"></i> {{ __('messages.home') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cars') }}">
                            <i class="fa fa-car me-1"></i> {{ __('messages.cars') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            <i class="fa fa-circle-info me-1"></i> {{ __('messages.about') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">
                            <i class="fa fa-envelope me-1"></i> {{ __('messages.contact') }}
                        </a>
                    </li>

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders.index') }}">
                                    <i class="fa fa-list me-1"></i> {{ __('messages.orders') }}
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders.myReservations') }}">
                                    <i class="fa fa-list me-1"></i> {{ __('messages.my_bookings') }}
                                </a>
                            </li>
                        @endif
                    @endauth

                </ul>

                <!-- RIGHT MENU -->
                <ul class="navbar-nav ms-auto align-items-center gap-lg-2">

                    @auth
                        {{-- زر الترجمة للأدمن --}}
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item dropdown me-2">
                                <a class="btn btn-outline-secondary btn-sm dropdown-toggle lang-btn"
                                   href="#"
                                   id="adminLangDropdown"
                                   role="button"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fa fa-language me-1"></i>
                                    {{ app()->getLocale() == 'ar' ? __('messages.arabic') : __('messages.english') }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminLangDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                            {{ __('messages.english') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                            {{ __('messages.arabic') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endauth

                    <!-- NOTIFICATIONS FOR ADMIN -->
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item dropdown me-2 position-relative">

                                <a class="nav-link icon-circle-btn border"
                                   href="#"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false"
                                   title="{{ __('messages.notifications') }}">
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
                                                <a class="dropdown-item notification-item"
                                                   href="{{ route('orders.notifications.redirect', $notification->id) }}">
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
                                <i class="fa fa-right-to-bracket me-1"></i> {{ __('messages.login') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fa fa-user-plus me-1"></i> {{ __('messages.register') }}
                            </a>
                        </li>

                    @else

                        {{-- =========================
                             ADMIN MENU => ICON ONLY
                        ========================== --}}
                        @if(Auth::user()->role === 'admin')

                            <li class="nav-item dropdown admin-menu">

                                <a class="nav-link icon-circle-btn border"
                                   href="#"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false"
                                   title="{{ Auth::user()->name }}">
                                    <i class="fa fa-user-shield"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            <i class="fa fa-chart-line me-2"></i> {{ __('messages.dashboard') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="fa fa-user me-2"></i> {{ __('messages.profile') }}
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            <i class="fa fa-users me-2"></i> {{ __('messages.users') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('categories.index') }}">
                                            <i class="fa fa-tags me-2"></i> {{ __('messages.categories') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('locations.index') }}">
                                            <i class="fa fa-location-dot me-2"></i> {{ __('messages.locations') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('products.index') }}">
                                            <i class="fa fa-car me-2"></i> {{ __('messages.cars') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('orders.index') }}">
                                            <i class="fa fa-list me-2"></i> {{ __('messages.orders') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('payments.index') }}">
                                            <i class="fa fa-credit-card me-2"></i> {{ __('messages.payments') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('comments.index') }}">
                                            <i class="fa fa-comments me-2"></i> {{ __('messages.comments') }}
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <a class="dropdown-item text-danger"
                                           href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out-alt me-2"></i> {{ __('messages.logout') }}
                                        </a>
                                    </li>

                                </ul>

                            </li>

                        @else

                            {{-- =========================
                                 NORMAL USER MENU
                            ========================== --}}
                            <li class="nav-item dropdown user-menu">

                                <a class="nav-link dropdown-toggle d-flex align-items-center"
                                   href="#"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fa fa-user-circle me-2"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="fa fa-user me-2"></i> {{ __('messages.profile') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('orders.myReservations') }}">
                                            <i class="fa fa-list me-2"></i> {{ __('messages.my_reservations') }}
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('favorites.index') }}">
                                            <i class="fa fa-heart me-2"></i> {{ __('messages.favorites') }}
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <a class="dropdown-item text-danger"
                                           href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out-alt me-2"></i> {{ __('messages.logout') }}
                                        </a>
                                    </li>

                                </ul>

                            </li>

                        @endif

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
