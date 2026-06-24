@extends('layouts.guest')

@section('content')

<!-- HERO -->
<section class="hero-wrap hero-wrap-2 js-fullheight"
         style="background-image: url('{{ asset('images/car-3.jpg') }}');"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>

    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('welcome') }}">{{ __('messages.home') }}</a>
                    </span>
                    <span>{{ __('messages.cars') }}</span>
                </p>

                <h1 class="mb-3 bread">{{ __('messages.choose_your_car') }}</h1>
            </div>
        </div>
    </div>
</section>

<!-- FILTERS -->
<section class="bg-white py-4 border-bottom">
    <div class="container">
        <form method="GET" class="row align-items-center">

            <!-- Search -->
            <div class="col-md-3 mb-2">
                <input type="text" name="search"
                       value="{{ request('search') }}"
                       class="form-control"
                       placeholder="Search cars...">
            </div>

            <!-- Brand -->
            <div class="col-md-2 mb-2">
                <input type="text" name="brand"
                       value="{{ request('brand') }}"
                       class="form-control"
                       placeholder="Brand">
            </div>

            <!-- Transmission -->
            <div class="col-md-2 mb-2">
                <select name="transmission" class="form-control">
                    <option value="">Transmission</option>
                    <option value="automatic" {{ request('transmission')=='automatic' ? 'selected' : '' }}>Automatic</option>
                    <option value="manual" {{ request('transmission')=='manual' ? 'selected' : '' }}>Manual</option>
                </select>
            </div>

            <!-- Fuel -->
            <div class="col-md-2 mb-2">
                <select name="fuel_type" class="form-control">
                    <option value="">Fuel</option>
                    <option value="petrol" {{ request('fuel_type')=='petrol' ? 'selected' : '' }}>Petrol</option>
                    <option value="diesel" {{ request('fuel_type')=='diesel' ? 'selected' : '' }}>Diesel</option>
                    <option value="electric" {{ request('fuel_type')=='electric' ? 'selected' : '' }}>Electric</option>
                </select>
            </div>

            <!-- Sort -->
            <div class="col-md-2 mb-2">
                <select name="sort" class="form-control">
                    <option value="">Sort By</option>
                    <option value="price_low" {{ request('sort')=='price_low' ? 'selected' : '' }}>Price ↑</option>
                    <option value="price_high" {{ request('sort')=='price_high' ? 'selected' : '' }}>Price ↓</option>
                    <option value="rating" {{ request('sort')=='rating' ? 'selected' : '' }}>Rating</option>
                    <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>Newest</option>
                </select>
            </div>

            <!-- Button -->
            <div class="col-md-1 mb-2">
                <button class="btn btn-primary btn-block">Go</button>
            </div>

        </form>
    </div>
</section>

<!-- CARS -->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">

            @forelse($products as $product)

                @php
                    $avgRating = $product->comments->avg('rating') ?? 0;
                    $ratingCount = $product->comments->count();

                    $isFavorite = auth()->check() && auth()->user()
                        ->favorites()
                        ->where('product_id', $product->id)
                        ->exists();
                @endphp

                <div class="col-md-4 mb-4 ftco-animate">
                    <div class="car-card bg-white shadow-sm h-100">

                        <!-- IMAGE -->
                        <div class="car-img position-relative">
                            @if($product->image)
                                <div class="car-image-box"
                                     style="background-image: url('{{ asset('img/product/'.$product->image) }}');">
                                </div>
                            @else
                                <div class="car-image-box d-flex align-items-center justify-content-center bg-secondary text-white">
                                    No Image
                                </div>
                            @endif

                            <!-- Favorite -->
                            @auth
                                <div class="favorite-btn-wrap">
                                    <form action="{{ route('favorites.toggle', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-sm favorite-btn {{ $isFavorite ? 'btn-danger' : 'btn-light' }}">
                                            ♥
                                        </button>
                                    </form>
                                </div>
                            @endauth
                        </div>

                        <!-- BODY -->
                        <div class="car-body p-3 d-flex flex-column">

                            <h5 class="mb-2">
                                <a href="{{ route('cars.show', $product->id) }}"
                                   class="text-dark text-decoration-none">
                                    {{ $product->name }}
                                </a>
                            </h5>

                            <!-- Rating -->
                            <div class="text-warning small mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= round($avgRating) ? '★' : '☆' }}
                                @endfor
                                <span class="text-muted">({{ number_format($avgRating, 1) }})</span>
                                <span class="text-muted">- {{ $ratingCount }} reviews</span>
                            </div>

                            <!-- Meta -->
                            <div class="small text-muted mb-3 car-meta">
                                <div><strong>Brand:</strong> {{ $product->brand ?? 'N/A' }}</div>
                                <div><strong>Year:</strong> {{ $product->year ?? 'N/A' }}</div>
                                <div><strong>City:</strong> {{ $product->location->city ?? 'N/A' }}</div>
                                <div><strong>Fuel:</strong> {{ ucfirst($product->fuel_type ?? 'N/A') }}</div>
                                <div><strong>Seats:</strong> {{ $product->seats ?? 'N/A' }}</div>
                            </div>

                            <!-- Price -->
                            <div class="car-price mb-3">
                                ${{ $product->daily_price }} <span>/ day</span>
                            </div>

                            <!-- Buttons -->
                            <div class="mt-auto">
                                <a href="{{ route('orders.checkout', $product->id) }}"
                                   class="btn btn-primary btn-block mb-2">
                                    {{ __('messages.book_now') }}
                                </a>

                                <a href="{{ route('cars.show', $product->id) }}"
                                   class="btn btn-outline-secondary btn-block">
                                    {{ __('messages.details') }}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            @empty
                <div class="col-md-12 text-center">
                    <h3>No cars found</h3>
                </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        @if(method_exists($products, 'links'))
            <div class="row mt-4">
                <div class="col-md-12 d-flex justify-content-center">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        @endif

    </div>
</section>

<style>
    .car-card {
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .car-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }

    .car-img {
        position: relative;
    }

    .car-image-box {
        height: 230px;
        background-size: cover;
        background-position: center;
        transition: transform 0.3s ease;
    }

    .car-card:hover .car-image-box {
        transform: scale(1.04);
    }

    .favorite-btn-wrap {
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 10;
    }

    .favorite-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 18px;
        line-height: 1;
        padding: 0;
    }

    .car-body {
        min-height: 320px;
    }

    .car-meta div {
        margin-bottom: 4px;
    }

    .car-price {
        font-size: 24px;
        font-weight: 700;
        color: #01d28e;
    }

    .car-price span {
        font-size: 14px;
        color: #777;
        font-weight: 400;
    }

    .text-decoration-none {
        text-decoration: none !important;
    }
</style>

@endsection


