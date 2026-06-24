@extends('layouts.guest')

@section('content')

<style>
    /* =========================
       FAVORITES PAGE PREMIUM
    ========================== */
    .favorites-hero .breadcrumbs a,
    .favorites-hero .breadcrumbs span {
        color: rgba(255,255,255,.95);
        font-weight: 500;
    }

    .favorites-hero .breadcrumbs i {
        margin-inline: 6px;
        font-size: 12px;
    }

    .favorites-section {
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    .favorites-head {
        text-align: center;
        margin-bottom: 42px;
    }

    .favorites-head .sub-title {
        display: inline-block;
        padding: 7px 16px;
        border-radius: 999px;
        background: rgba(13,110,253,.08);
        color: #0d6efd;
        font-weight: 800;
        font-size: 13px;
        letter-spacing: .4px;
        margin-bottom: 14px;
    }

    .favorites-head h2 {
        font-size: 2rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .favorites-head p {
        color: #6b7280;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .favorite-card {
        position: relative;
        background: #fff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 14px 40px rgba(15, 23, 42, .08);
        transition: all .28s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(0,0,0,.04);
    }

    .favorite-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 22px 55px rgba(15, 23, 42, .14);
    }

    .favorite-media {
        position: relative;
        height: 255px;
        overflow: hidden;
        background: #f1f3f5;
    }

    .favorite-media::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,.38), rgba(0,0,0,.05));
        pointer-events: none;
    }

    .favorite-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .45s ease;
        display: block;
    }

    .favorite-card:hover .favorite-media img {
        transform: scale(1.06);
    }

    .favorite-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #ced4da, #adb5bd);
        color: #fff;
        font-weight: 700;
        font-size: 15px;
        position: relative;
        z-index: 1;
    }

    .favorite-badge {
        position: absolute;
        top: 16px;
        inset-inline-start: 16px;
        z-index: 3;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255,255,255,.94);
        color: #111827;
        padding: 9px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
        box-shadow: 0 10px 24px rgba(0,0,0,.12);
        backdrop-filter: blur(6px);
    }

    .favorite-badge i {
        color: #0d6efd;
    }

    .favorite-price-chip {
        position: absolute;
        bottom: 16px;
        inset-inline-start: 16px;
        z-index: 3;
        background: rgba(13,110,253,.95);
        color: #fff;
        padding: 10px 14px;
        border-radius: 16px;
        box-shadow: 0 12px 24px rgba(13,110,253,.28);
        min-width: 140px;
    }

    .favorite-price-chip .price-label {
        display: block;
        font-size: 11px;
        opacity: .9;
        margin-bottom: 2px;
        font-weight: 600;
    }

    .favorite-price-chip .price-value {
        font-size: 1.05rem;
        font-weight: 800;
        line-height: 1.2;
    }

    .favorite-remove-form {
        position: absolute;
        top: 14px;
        inset-inline-end: 14px;
        z-index: 4;
    }

    .favorite-remove-btn {
        width: 44px;
        height: 44px;
        border: 0;
        border-radius: 50%;
        background: rgba(255,255,255,.96);
        color: #dc3545;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 22px rgba(0,0,0,.12);
        transition: all .2s ease;
    }

    .favorite-remove-btn:hover {
        background: #dc3545;
        color: #fff;
        transform: scale(1.08);
    }

    .favorite-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .favorite-title-row {
        display: flex;
        align-items: start;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 10px;
    }

    .favorite-title {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 800;
        line-height: 1.45;
    }

    .favorite-title a {
        color: #111827;
        text-decoration: none;
    }

    .favorite-title a:hover {
        color: #0d6efd;
    }

    .favorite-year-pill {
        white-space: nowrap;
        background: #111827;
        color: #fff;
        font-size: 12px;
        font-weight: 800;
        border-radius: 999px;
        padding: 7px 12px;
    }

    .favorite-rating {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 16px;
    }

    .favorite-stars {
        color: #f5b301;
        display: flex;
        gap: 2px;
        font-size: 15px;
    }

    .favorite-rating-text {
        color: #6b7280;
        font-size: 14px;
        font-weight: 600;
    }

    .favorite-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 18px;
    }

    .favorite-tag {
        padding: 8px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        line-height: 1;
    }

    .tag-primary {
        background: rgba(13,110,253,.1);
        color: #0d6efd;
    }

    .tag-secondary {
        background: #eef2f7;
        color: #495057;
    }

    .favorite-spec-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 18px;
    }

    .favorite-spec-box {
        background: #f8fafc;
        border: 1px solid #eef2f6;
        border-radius: 16px;
        padding: 12px 14px;
        min-height: 78px;
    }

    .favorite-spec-box .spec-top {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #0d6efd;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .favorite-spec-box .spec-value {
        color: #111827;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.6;
        word-break: break-word;
    }

    .favorite-description {
        color: #6b7280;
        line-height: 1.85;
        font-size: 14px;
        margin-bottom: 20px;
        min-height: 74px;
    }

    .favorite-prices {
        background: #f8fafc;
        border: 1px solid #edf1f5;
        border-radius: 18px;
        padding: 16px;
        margin-bottom: 20px;
    }

    .favorite-price-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 8px 0;
        border-bottom: 1px dashed #dde3ea;
    }

    .favorite-price-row:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .favorite-price-row:first-child {
        padding-top: 0;
    }

    .favorite-price-name {
        color: #6b7280;
        font-size: 14px;
        font-weight: 700;
    }

    .favorite-price-amount {
        color: #111827;
        font-weight: 800;
        font-size: 15px;
    }

    .favorite-price-row.primary .favorite-price-amount {
        color: #0d6efd;
        font-size: 18px;
    }

    .favorite-actions {
        margin-top: auto;
    }

    .favorite-actions .btn {
        border-radius: 14px;
        font-weight: 800;
        padding: 12px 16px;
    }

    .favorite-empty-box {
        background: #fff;
        border-radius: 28px;
        padding: 60px 28px;
        text-align: center;
        box-shadow: 0 16px 45px rgba(15, 23, 42, .08);
        border: 1px solid rgba(0,0,0,.04);
    }

    .favorite-empty-icon {
        width: 96px;
        height: 96px;
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        color: #0d6efd;
        background: rgba(13,110,253,.08);
    }

    .favorite-empty-box h3 {
        font-weight: 800;
        color: #111827;
        margin-bottom: 10px;
    }

    .favorite-empty-box p {
        color: #6b7280;
        max-width: 550px;
        margin: 0 auto 24px;
        line-height: 1.8;
    }

    @media (max-width: 991.98px) {
        .favorite-spec-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 767.98px) {
        .favorites-head h2 {
            font-size: 1.6rem;
        }

        .favorite-media {
            height: 230px;
        }

        .favorite-body {
            padding: 18px;
        }

        .favorite-title {
            font-size: 1.15rem;
        }

        .favorite-title-row {
            flex-direction: column;
            align-items: start;
        }

        .favorite-spec-grid {
            grid-template-columns: 1fr;
        }

        .favorite-description {
            min-height: auto;
        }

        .favorite-price-chip {
            min-width: auto;
            max-width: calc(100% - 80px);
        }
    }
</style>

<!-- HERO -->
<section class="hero-wrap hero-wrap-2 js-fullheight favorites-hero"
         style="background-image: url('{{ asset('images/bg_3.jpg') }}');"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>

    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2">
                    <span class="mr-2">
                        <a href="{{ route('welcome') }}">
                            {{ __('messages.home') }}
                            <i class="ion-ios-arrow-forward"></i>
                        </a>
                    </span>

                    <span>
                        {{ __('messages.my_favorites') }}
                        <i class="ion-ios-arrow-forward"></i>
                    </span>
                </p>

                <h1 class="mb-3 bread">
                    {{ __('messages.my_favorite_cars') }}
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- FAVORITES -->
<section class="ftco-section favorites-section">
    <div class="container">

        @if($favorites->count())
            <div class="favorites-head ftco-animate">
                <span class="sub-title">{{ __('messages.favorites') }}</span>
                <h2>{{ __('messages.my_favorite_cars') }}</h2>
                <p>{{ __('messages.browse_and_add_favorites') }}</p>
            </div>
        @endif

        <div class="row">

            @forelse($favorites as $product)

                @php
                    $avgRating = $product->comments->avg('rating') ?? 0;
                    $ratingCount = $product->comments->count();

                    $categoryTitle = app()->getLocale() == 'ar'
                        ? ($product->category->title_ar ?? __('messages.na'))
                        : ($product->category->title_en ?? __('messages.na'));

                    $locationText = $product->location
                        ? trim(($product->location->city ?? '') . (!empty($product->location->area) ? ' - '.$product->location->area : ''))
                        : __('messages.na');
                @endphp

                <div class="col-md-6 col-xl-4 mb-4 ftco-animate">
                    <div class="favorite-card">

                        <!-- IMAGE -->
                        <div class="favorite-media">

                            @if($product->image)
                                <img src="{{ asset('img/product/'.$product->image) }}" alt="{{ $product->name }}">
                            @else
                                <div class="favorite-placeholder">
                                    {{ __('messages.no_image') }}
                                </div>
                            @endif

                            <div class="favorite-badge">
                                <i class="fa-solid fa-car-side"></i>
                                {{ $product->brand ?? __('messages.car') }}
                            </div>

                            <div class="favorite-price-chip">
                                <span class="price-label">{{ __('messages.daily') }}</span>
                                <div class="price-value">${{ $product->daily_price }}</div>
                            </div>

                            <form action="{{ route('favorites.toggle', $product->id) }}"
                                  method="POST"
                                  class="favorite-remove-form">
                                @csrf
                                <button type="submit"
                                        class="favorite-remove-btn"
                                        title="{{ __('messages.remove_from_favorites') }}">
                                     <i class="fas fa-heart"></i>
                                </button>
                            </form>
                        </div>

                        <!-- BODY -->
                        <div class="favorite-body">

                            <div class="favorite-title-row">
                                <h2 class="favorite-title">
                                    <a href="{{ route('cars.show', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </h2>

                                @if($product->year)
                                    <span class="favorite-year-pill">{{ $product->year }}</span>
                                @endif
                            </div>

                            <!-- RATING -->
                            <div class="favorite-rating">
                                <div class="favorite-stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= round($avgRating))
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-regular fa-star"></i>
                                        @endif
                                    @endfor
                                </div>

                                <div class="favorite-rating-text">
                                    {{ number_format($avgRating, 1) }}
                                    <span class="mx-1">•</span>
                                    {{ $ratingCount }} {{ __('messages.reviews') }}
                                </div>
                            </div>

                            <!-- TAGS -->
                            <div class="favorite-tags">
                                @if($product->model)
                                    <span class="favorite-tag tag-primary">
                                        {{ $product->model }}
                                    </span>
                                @endif

                                @if($product->color)
                                    <span class="favorite-tag tag-secondary">
                                        {{ $product->color }}
                                    </span>
                                @endif

                                @if($product->transmission)
                                    <span class="favorite-tag tag-secondary">
                                        {{ ucfirst($product->transmission) }}
                                    </span>
                                @endif
                            </div>

                            <!-- SPEC GRID -->
                            <div class="favorite-spec-grid">

                                <div class="favorite-spec-box">
                                    <div class="spec-top">
                                        <i class="fa-solid fa-layer-group"></i>
                                        <span>{{ __('messages.category') }}</span>
                                    </div>
                                    <div class="spec-value">
                                        {{ $categoryTitle }}
                                    </div>
                                </div>

                                <div class="favorite-spec-box">
                                    <div class="spec-top">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>{{ __('messages.location') }}</span>
                                    </div>
                                    <div class="spec-value">
                                        {{ $locationText }}
                                    </div>
                                </div>

                                <div class="favorite-spec-box">
                                    <div class="spec-top">
                                        <i class="fa-solid fa-gas-pump"></i>
                                        <span>{{ __('messages.fuel') }}</span>
                                    </div>
                                    <div class="spec-value">
                                        {{ $product->fuel_type ? ucfirst($product->fuel_type) : __('messages.na') }}
                                    </div>
                                </div>

                                <div class="favorite-spec-box">
                                    <div class="spec-top">
                                        <i class="fa-solid fa-users"></i>
                                        <span>{{ __('messages.seats') }}</span>
                                    </div>
                                    <div class="spec-value">
                                        {{ $product->seats ?? __('messages.na') }}
                                    </div>
                                </div>

                            </div>

                            <!-- DESCRIPTION -->
                            <p class="favorite-description">
                                {{ \Illuminate\Support\Str::limit($product->description ?: __('messages.no_description_available'), 115) }}
                            </p>

                            <!-- PRICES -->
                            <div class="favorite-prices">
                                <div class="favorite-price-row primary">
                                    <span class="favorite-price-name">{{ __('messages.daily') }}</span>
                                    <span class="favorite-price-amount">${{ $product->daily_price }}</span>
                                </div>

                                @if($product->weekly_price)
                                    <div class="favorite-price-row">
                                        <span class="favorite-price-name">{{ __('messages.weekly') }}</span>
                                        <span class="favorite-price-amount">${{ $product->weekly_price }}</span>
                                    </div>
                                @endif

                                @if($product->monthly_price)
                                    <div class="favorite-price-row">
                                        <span class="favorite-price-name">{{ __('messages.monthly') }}</span>
                                        <span class="favorite-price-amount">${{ $product->monthly_price }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- ACTIONS -->
                            <div class="favorite-actions">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('orders.checkout', $product->id) }}"
                                       class="btn btn-primary">
                                        <i class="fa-solid fa-calendar-check me-2"></i>
                                        {{ __('messages.book_now') }}
                                    </a>

                                    <a href="{{ route('cars.show', $product->id) }}"
                                       class="btn btn-outline-dark">
                                        <i class="fa-solid fa-eye me-2"></i>
                                        {{ __('messages.details') }}
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12">
                    <div class="favorite-empty-box ftco-animate">
                        <div class="favorite-empty-icon">
                            <i class="fa-regular fa-heart"></i>
                        </div>

                        <h3>{{ __('messages.no_favorite_cars_yet') }}</h3>
                        <p>{{ __('messages.browse_and_add_favorites') }}</p>

                        <a href="{{ route('cars') }}" class="btn btn-primary px-4 py-2">
                            <i class="fa-solid fa-car-side me-2"></i>
                            {{ __('messages.browse_cars') }}
                        </a>
                    </div>
                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection
