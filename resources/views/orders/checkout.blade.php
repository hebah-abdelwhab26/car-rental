@extends('layouts.guest')

@section('content')

@php
    $isAvailable = (bool) ($product->available ?? true);
    $avgRating   = $product->comments->avg('rating') ?? 0;
    $ratingCount = $product->comments->count();
@endphp

<!-- HERO -->
<div class="hero-wrap ftco-degree-bg"
     style="
        background-image:url('{{ asset('img/product/'.$product->image) }}');
        min-height:420px;
        background-size:cover;
        background-position:center;
        position:relative;
     ">
    <div class="overlay"></div>

    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12 text-center text-white">
                <h1 class="display-4 mb-2">{{ $product->name }}</h1>

                <p class="mb-2" style="font-size:18px;">
                    {{ $product->brand }} - {{ $product->model }} - {{ $product->year }}
                </p>

                <h3 class="mb-0">
                    ${{ number_format($product->daily_price, 2) }}
                    / {{ __('messages.daily') }}
                </h3>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success shadow-sm border-0">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR MESSAGE --}}
        @if(session('error'))
            <div class="alert alert-danger shadow-sm border-0">
                {{ session('error') }}
            </div>
        @endif

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm border-0">
                <strong>{{ __('messages.booking_form_errors') }}</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- AVAILABILITY ALERT --}}
        @if(!$isAvailable)
            <div class="alert alert-warning shadow-sm border-0">
                <strong>{{ __('messages.unavailable') }}</strong>
                <div class="small text-muted mt-1">
                    {{ __('messages.choose_another_car_or_try_later') }}
                </div>
            </div>
        @endif

        <div class="row">

            <!-- LEFT SIDE -->
            <div class="col-lg-7 mb-4">
                <div class="card shadow border-0 car-details-card overflow-hidden">

                    <img src="{{ asset('img/product/'.$product->image) }}"
                         class="card-img-top"
                         alt="{{ $product->name }}"
                         style="height:360px; object-fit:cover;">

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-3">
                            <div>
                                <h3 class="mb-1">{{ $product->name }}</h3>
                                <p class="text-muted mb-0">
                                    {{ $product->brand }} / {{ $product->model }} / {{ $product->year }}
                                </p>
                            </div>

                            @if($isAvailable)
                                <span class="badge badge-success px-3 py-2">
                                    {{ __('messages.available') }}
                                </span>
                            @else
                                <span class="badge badge-danger px-3 py-2">
                                    {{ __('messages.unavailable') }}
                                </span>
                            @endif
                        </div>

                        <!-- Rating -->
                        <div class="mb-3 text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                {{ $i <= round($avgRating) ? '★' : '☆' }}
                            @endfor
                            <span class="text-muted ml-2">
                                {{ number_format($avgRating, 1) }} ({{ $ratingCount }} {{ __('messages.reviews') }})
                            </span>
                        </div>

                        <hr class="my-4">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-3 bg-white h-100">
                                    <strong>{{ __('messages.brand') }}:</strong>
                                    <div class="text-muted">{{ $product->brand ?? '-' }}</div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-3 bg-white h-100">
                                    <strong>{{ __('messages.model') }}:</strong>
                                    <div class="text-muted">{{ $product->model ?? '-' }}</div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-3 bg-white h-100">
                                    <strong>{{ __('messages.year') }}:</strong>
                                    <div class="text-muted">{{ $product->year ?? '-' }}</div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-3 bg-white h-100">
                                    <strong>{{ __('messages.color') }}:</strong>
                                    <div class="text-muted">{{ $product->color ?? '-' }}</div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-3 bg-white h-100">
                                    <strong>{{ __('messages.seats') }}:</strong>
                                    <div class="text-muted">{{ $product->seats ?? '-' }}</div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-3 bg-white h-100">
                                    <strong>{{ __('messages.fuel') }}:</strong>
                                    <div class="text-muted">{{ ucfirst($product->fuel_type ?? '-') }}</div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-3 bg-white h-100">
                                    <strong>{{ __('messages.transmission') }}:</strong>
                                    <div class="text-muted">{{ ucfirst($product->transmission ?? '-') }}</div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-3 bg-white h-100">
                                    <strong>{{ __('messages.category') }}:</strong>
                                    <div class="text-muted">
                                        {{ app()->getLocale() === 'ar'
                                            ? ($product->category->title_ar ?? '-')
                                            : ($product->category->title_en ?? '-') }}
                                    </div>
                                </div>
                            </div>

                            @if(!empty($product->location))
                                <div class="col-md-12 mb-3">
                                    <div class="border rounded p-3 bg-white h-100">
                                        <strong>{{ __('messages.location') }}:</strong>
                                        <div class="text-muted">
                                            {{ $product->location->city ?? '' }}
                                            @if(!empty($product->location->country))
                                                , {{ $product->location->country }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                        <hr class="my-4">

                        {{-- DESCRIPTION --}}
                        <h5 class="mb-3">{{ __('messages.description') }}</h5>
                        <p class="text-muted mb-4">
                            {{ $product->description ?: __('messages.no_description_available') }}
                        </p>

                        {{-- PRICES --}}
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="bg-light border rounded p-3 text-center h-100">
                                    <div class="text-muted small">{{ __('messages.daily') }}</div>
                                    <div class="price-value text-primary">
                                        ${{ number_format($product->daily_price ?? 0,2) }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="bg-light border rounded p-3 text-center h-100">
                                    <div class="text-muted small">{{ __('messages.weekly') }}</div>
                                    <div class="price-value">
                                        ${{ number_format($product->weekly_price ?? 0,2) }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="bg-light border rounded p-3 text-center h-100">
                                    <div class="text-muted small">{{ __('messages.monthly') }}</div>
                                    <div class="price-value">
                                        ${{ number_format($product->monthly_price ?? 0,2) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!empty($product->deposit_amount))
                            <div class="alert alert-warning mt-3">
                                <strong>{{ __('messages.deposit') }}:</strong>
                                ${{ number_format($product->deposit_amount,2) }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-5">
                <div class="card shadow border-0 booking-card sticky-top" style="top: 100px;">
                    <div class="card-body p-4">

                        <h4 class="mb-3">{{ __('messages.book_now') }}</h4>

                        <div class="mb-3">
                            <div class="text-muted small">{{ __('messages.daily_price') }}</div>
                            <div class="price-value text-primary">
                                ${{ number_format($product->daily_price, 2) }}
                            </div>
                        </div>

                        @if($isAvailable)
                            <form action="{{ route('orders.store', $product->id) }}" method="POST" id="bookingForm">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="form-group">
                                    <label>{{ __('messages.pickup_date') }}</label>
                                    <input type="date"
                                           id="start_date"
                                           name="start_date"
                                           class="form-control"
                                           value="{{ old('start_date') }}"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('messages.return_date') }}</label>
                                    <input type="date"
                                           id="end_date"
                                           name="end_date"
                                           class="form-control"
                                           value="{{ old('end_date') }}"
                                           required>
                                </div>

                                {{-- PAYMENT METHOD --}}
                                <div class="form-group">
                                    <label>{{ __('messages.payment_method') }}</label>
                                    <select name="payment_method" class="form-control" required>
                                        <option value="">{{ __('messages.select_payment_method') }}</option>
                                        <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>
                                            {{ __('messages.cash') }}
                                        </option>
                                        <option value="card" {{ old('payment_method') == 'card' ? 'selected' : '' }}>
                                            {{ __('messages.card') }}
                                        </option>
                                        <option value="wallet" {{ old('payment_method') == 'wallet' ? 'selected' : '' }}>
                                            {{ __('messages.wallet') }}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('messages.pickup_location') }}</label>
                                    <input type="text"
                                           name="pickup_location"
                                           class="form-control"
                                           value="{{ old('pickup_location') }}"
                                           placeholder="{{ __('messages.enter_pickup_location') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ __('messages.notes') }}</label>
                                    <textarea name="notes"
                                              rows="4"
                                              class="form-control"
                                              placeholder="{{ __('messages.any_special_requests') }}">{{ old('notes') }}</textarea>
                                </div>

                                {{-- LIVE SUMMARY --}}
                                <div class="border rounded p-3 bg-light mb-3">
                                    <h6 class="mb-3">{{ __('messages.booking_summary') }}</h6>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span>{{ __('messages.price_per_day') }}</span>
                                        <strong>${{ number_format($product->daily_price, 2) }}</strong>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span>{{ __('messages.days') }}</span>
                                        <strong id="booking_days">0</strong>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <span><strong>{{ __('messages.total_price') }}</strong></span>
                                        <strong class="text-primary" id="booking_total">$0.00</strong>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('messages.book_now') }}
                                </button>
                            </form>
                        @else
                            <div class="alert alert-danger mb-0">
                                {{ __('messages.car_unavailable_for_booking') }}
                            </div>
                        @endif

                        <hr>

                        <h5 class="mb-3">{{ __('messages.booking_summary') }}</h5>
                        <ul class="list-unstyled text-muted mb-0">
                            <li class="mb-2"><strong>{{ __('messages.car') }}:</strong> {{ $product->name }}</li>
                            <li class="mb-2"><strong>{{ __('messages.brand') }}:</strong> {{ $product->brand }}</li>
                            <li class="mb-2"><strong>{{ __('messages.price_per_day') }}:</strong> ${{ number_format($product->daily_price, 2) }}</li>

                            @if(!empty($product->deposit_amount))
                                <li class="mb-2"><strong>{{ __('messages.deposit') }}:</strong> ${{ number_format($product->deposit_amount, 2) }}</li>
                            @endif
                        </ul>

                    </div>
                </div>
            </div>

        </div>

        {{-- COMMENTS / REVIEWS --}}
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <h4 class="mb-4">{{ __('messages.customer_reviews') }}</h4>

                        @forelse($product->comments as $comment)
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <strong>{{ $comment->user->name ?? __('messages.user') }}</strong>
                                    <small class="text-muted">
                                        {{ $comment->created_at ? $comment->created_at->format('Y-m-d') : '' }}
                                    </small>
                                </div>

                                <div class="text-warning mb-2">
                                    @for($i=1;$i<=5;$i++)
                                        {{ $i <= ($comment->rating ?? 0) ? '★' : '☆' }}
                                    @endfor
                                </div>

                                <p class="mb-0 text-muted">
                                    {{ $comment->content }}
                                </p>
                            </div>
                        @empty
                            <p class="text-muted mb-0">{{ __('messages.no_reviews_yet_for_this_car') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .car-details-card,
    .booking-card {
        border-radius: 18px;
    }

    .price-value {
        font-size: 24px;
        font-weight: 700;
    }

    .card {
        border-radius: 18px;
    }

    .badge {
        font-size: 13px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const startDateInput = document.getElementById('start_date');
    const endDateInput   = document.getElementById('end_date');
    const daysBox        = document.getElementById('booking_days');
    const totalBox       = document.getElementById('booking_total');

    const dailyPrice = {{ (float) $product->daily_price }};

    function calculateBookingTotal() {
        const start = startDateInput?.value;
        const end   = endDateInput?.value;

        if (!start || !end) {
            daysBox.textContent = '0';
            totalBox.textContent = '$0.00';
            return;
        }

        const startDate = new Date(start);
        const endDate   = new Date(end);

        if (endDate < startDate) {
            daysBox.textContent = '0';
            totalBox.textContent = '$0.00';
            return;
        }

        const diffTime = endDate.getTime() - startDate.getTime();
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;

        const total = diffDays * dailyPrice;

        daysBox.textContent = diffDays;
        totalBox.textContent = '$' + total.toFixed(2);
    }

    if (startDateInput && endDateInput) {
        startDateInput.addEventListener('change', calculateBookingTotal);
        endDateInput.addEventListener('change', calculateBookingTotal);

        calculateBookingTotal();
    }
});
</script>

@endsection

