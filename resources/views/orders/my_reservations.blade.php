@extends('layouts.guest')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight"
         style="background-image: url('{{ asset('images/bg_3.jpg') }}');"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>

    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('welcome') }}">
                            {{ __('messages.home') }}
                            <i class="ion-ios-arrow-forward"></i>
                        </a>
                    </span>

                    <span>
                        {{ __('messages.my_reservations') }}
                        <i class="ion-ios-arrow-forward"></i>
                    </span>
                </p>

                <h1 class="mb-3 bread">
                    {{ __('messages.my_reservations') }}
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light reservations-page">
    <div class="container">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success shadow-sm rounded-pill px-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR MESSAGE --}}
        @if(session('error'))
            <div class="alert alert-danger shadow-sm rounded-pill px-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- PAGE HEADER --}}
        <div class="reservations-header mb-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                    <h2 class="mb-2">{{ __('messages.my_reservations') }}</h2>
                    <p class="text-muted mb-0">
                        {{ __('messages.track_your_current_and_previous_bookings') }}
                    </p>
                </div>

                <div class="reservation-counter">
                    <span class="count-box">
                        {{ $orders->count() }}
                    </span>
                    <span class="count-label">
                        {{ __('messages.reservations') }}
                    </span>
                </div>
            </div>
        </div>

        @if($orders->count() > 0)

            <div class="row">

                @foreach($orders as $order)

                    <div class="col-lg-6 mb-4">
                        <div class="reservation-card card border-0 shadow-sm h-100 overflow-hidden">

                            {{-- CARD TOP IMAGE --}}
                            <div class="reservation-image-wrap position-relative">
                                @if($order->product && $order->product->image)
                                    <div class="reservation-image"
                                         style="background-image:url('{{ asset('img/product/'.$order->product->image) }}');">
                                    </div>
                                @else
                                    <div class="reservation-image d-flex align-items-center justify-content-center bg-secondary text-white">
                                        {{ __('messages.no_image') }}
                                    </div>
                                @endif

                                <div class="reservation-status-badge">
                                    @if($order->status == 'pending')
                                        <span class="badge badge-warning px-3 py-2">
                                            {{ __('messages.pending') }}
                                        </span>
                                    @elseif($order->status == 'confirmed')
                                        <span class="badge badge-primary px-3 py-2">
                                            {{ __('messages.confirmed') }}
                                        </span>
                                    @elseif($order->status == 'completed')
                                        <span class="badge badge-success px-3 py-2">
                                            {{ __('messages.completed') }}
                                        </span>
                                    @elseif($order->status == 'cancelled')
                                        <span class="badge badge-danger px-3 py-2">
                                            {{ __('messages.cancelled') }}
                                        </span>
                                    @else
                                        <span class="badge badge-secondary px-3 py-2">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="card-body p-4 d-flex flex-column">

                                {{-- TITLE --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                                        <div>
                                            <h4 class="reservation-title mb-1">
                                                {{ $order->product->name ?? __('messages.car_reservation') }}
                                            </h4>
                                            <p class="text-muted mb-0">
                                                {{ __('messages.reservation_number') }} #{{ $order->id }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{-- MAIN INFO --}}
                                <div class="reservation-info-grid mb-4">

                                    <div class="info-box">
                                        <div class="info-label">{{ __('messages.start_date') }}</div>
                                        <div class="info-value">
                                            {{ \Carbon\Carbon::parse($order->start_date)->format('d M Y') }}
                                        </div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">{{ __('messages.end_date') }}</div>
                                        <div class="info-value">
                                            {{ \Carbon\Carbon::parse($order->end_date)->format('d M Y') }}
                                        </div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">{{ __('messages.total_price') }}</div>
                                        <div class="info-value text-primary font-weight-bold">
                                            ${{ number_format($order->total_price,2) }}
                                        </div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">{{ __('messages.payment_method') }}</div>
                                        <div class="info-value">
                                            {{ ucfirst($order->payment_method ?? ($order->payment->payment_method ?? 'N/A')) }}
                                        </div>
                                    </div>

                                </div>

                                {{-- PAYMENT STATUS --}}
                                <div class="reservation-meta-box mb-3">
                                    <div class="meta-title">{{ __('messages.payment_details') }}</div>

                                    <div class="meta-row">
                                        <span class="meta-label">{{ __('messages.payment_status') }}</span>
                                        <span class="meta-value">
                                            @php
                                                $paymentStatus = $order->payment->payment_status ?? 'pending';
                                            @endphp

                                            @if($paymentStatus == 'pending')
                                                <span class="badge badge-warning px-3 py-2">
                                                    {{ __('messages.pending') }}
                                                </span>
                                            @elseif($paymentStatus == 'paid')
                                                <span class="badge badge-success px-3 py-2">
                                                    {{ __('messages.paid') }}
                                                </span>
                                            @elseif($paymentStatus == 'failed')
                                                <span class="badge badge-danger px-3 py-2">
                                                    {{ __('messages.failed') }}
                                                </span>
                                            @elseif($paymentStatus == 'refunded')
                                                <span class="badge badge-info px-3 py-2">
                                                    {{ __('messages.refunded') }}
                                                </span>
                                            @else
                                                <span class="badge badge-secondary px-3 py-2">
                                                    {{ ucfirst($paymentStatus) }}
                                                </span>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="meta-row">
                                        <span class="meta-label">{{ __('messages.booked_on') }}</span>
                                        <span class="meta-value">
                                            {{ $order->created_at->format('d M Y - h:i A') }}
                                        </span>
                                    </div>
                                </div>

                                {{-- ACTIONS --}}
                                <div class="mt-auto pt-2">
                                    <div class="d-flex flex-wrap gap-2 reservation-actions">

                                        @if($order->product)
                                            <a href="{{ route('cars.show',$order->product->id) }}"
                                               class="btn btn-outline-dark btn-sm">
                                                {{ __('messages.view_car') }}
                                            </a>
                                        @endif

                                        @if($order->status == 'pending')
                                            <form action="{{ route('orders.cancelReservation',$order->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('{{ __('messages.cancel_confirmation') }}');"
                                                  class="mb-0">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm">
                                                    {{ __('messages.cancel_reservation') }}
                                                </button>
                                            </form>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

        @else

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="empty-reservations card border-0 shadow-sm text-center p-5">
                        <div class="card-body py-4">
                            <div class="empty-icon mb-4">🚗</div>

                            <h3 class="mb-3">
                                {{ __('messages.no_reservations_found') }}
                            </h3>

                            <p class="text-muted mb-4">
                                {{ __('messages.no_booked_cars') }}
                            </p>

                            <a href="{{ route('cars') }}" class="btn btn-primary px-4 py-2">
                                {{ __('messages.browse_cars') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @endif

    </div>
</section>

<style>
    .reservations-page {
        padding-top: 70px;
        padding-bottom: 80px;
    }

    .reservations-header h2 {
        font-size: 32px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
    }

    .reservation-counter {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #fff;
        border-radius: 16px;
        padding: 14px 18px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
    }

    .count-box {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #0d6efd;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 18px;
    }

    .count-label {
        font-weight: 600;
        color: #374151;
    }

    .reservation-card {
        border-radius: 22px;
        transition: all .25s ease;
        background: #fff;
    }

    .reservation-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 35px rgba(0,0,0,0.10) !important;
    }

    .reservation-image-wrap {
        position: relative;
    }

    .reservation-image {
        height: 240px;
        background-size: cover;
        background-position: center;
        border-top-left-radius: 22px;
        border-top-right-radius: 22px;
    }

    .reservation-status-badge {
        position: absolute;
        top: 16px;
        right: 16px;
    }

    .reservation-title {
        font-size: 24px;
        font-weight: 700;
        color: #111827;
    }

    .reservation-info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .info-box {
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 16px;
        padding: 14px 16px;
    }

    .info-label {
        font-size: 13px;
        color: #6b7280;
        margin-bottom: 6px;
        font-weight: 500;
    }

    .info-value {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        word-break: break-word;
    }

    .reservation-meta-box {
        background: #ffffff;
        border: 1px solid #eef2f7;
        border-radius: 18px;
        padding: 18px;
        box-shadow: inset 0 0 0 1px rgba(255,255,255,0.3);
    }

    .meta-title {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 14px;
    }

    .meta-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        padding: 10px 0;
        border-bottom: 1px dashed #e5e7eb;
    }

    .meta-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .meta-label {
        color: #6b7280;
        font-weight: 500;
    }

    .meta-value {
        color: #111827;
        font-weight: 600;
        text-align: right;
    }

    .reservation-actions {
        gap: 10px;
    }

    .reservation-actions .btn {
        border-radius: 12px;
        padding: 9px 16px;
        font-weight: 600;
    }

    .empty-reservations {
        border-radius: 24px;
    }

    .empty-icon {
        font-size: 48px;
        line-height: 1;
    }

    @media (max-width: 767px) {
        .reservation-info-grid {
            grid-template-columns: 1fr;
        }

        .reservations-header h2 {
            font-size: 26px;
        }

        .reservation-title {
            font-size: 20px;
        }

        .meta-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .meta-value {
            text-align: left;
        }
    }
</style>

@endsection
