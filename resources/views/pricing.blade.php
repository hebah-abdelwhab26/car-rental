
@extends('layouts.guest')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{ asset('images/bg_1.jpg') }}');"
    data-stellar-background-ratio="0.5">

    <div class="overlay"></div>

    <div class="container">

        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">

            <div class="col-md-9 ftco-animate pb-5">

                <p class="breadcrumbs">

                    <span class="mr-2">
                        <a href="{{ url('/') }}">
                            {{ __('messages.home') }}
                            <i class="ion-ios-arrow-forward"></i>
                        </a>
                    </span>

                    <span>
                        {{ __('messages.pricing') }}
                        <i class="ion-ios-arrow-forward"></i>
                    </span>

                </p>

                <h1 class="mb-3 bread">{{ __('messages.pricing') }}</h1>

            </div>

        </div>

    </div>

</section>

<section class="ftco-section ftco-cart">

    <div class="container">

        <div class="row">

            <div class="col-md-12 ftco-animate">

                <div class="car-list">

                    <table class="table">

                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>

                                <th class="bg-primary heading">
                                    {{ __('messages.per_day_rate') }}
                                </th>

                                <th class="bg-dark heading">
                                    {{ app()->getLocale() === 'ar' ? 'السعر الأسبوعي' : 'Weekly Rate' }}
                                </th>

                                <th class="bg-black heading">
                                    {{ __('messages.leasing') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($products as $product)

                                @php
                                    $rating = (float) ($product->comments_avg_rating ?? 0);

                                    $imagePath = $product->image
                                        ? asset($product->image)
                                        : asset('images/car-1.jpg');
                                @endphp

                                <tr>

                                    {{-- صورة السيارة --}}
                                    <td class="car-image">
                                        <div
                                            class="img"
                                            style="background-image: url('{{ $imagePath }}');">
                                        </div>
                                    </td>

                                    {{-- بيانات السيارة والتقييم --}}
                                    <td class="product-name">

                                        <h3>{{ $product->name }}</h3>

                                        <p class="mb-1">
                                            {{ $product->brand }}
                                            {{ $product->model }}
                                            ({{ $product->year }})
                                        </p>

                                        <p class="mb-0 rated">

                                            <span>
                                                {{ app()->getLocale() === 'ar' ? 'التقييم' : 'Rating' }}
                                            </span>

                                            @for ($star = 1; $star <= 5; $star++)
                                                <span
                                                    class="{{ $rating >= $star
                                                        ? 'ion-ios-star'
                                                        : ($rating >= $star - 0.5
                                                            ? 'ion-ios-star-half'
                                                            : 'ion-ios-star-outline') }}">
                                                </span>
                                            @endfor

                                            <small>
                                                @if (($product->comments_count ?? 0) > 0)
                                                    {{ number_format($rating, 1) }}/5
                                                    ({{ $product->comments_count }})
                                                @else
                                                    {{ app()->getLocale() === 'ar'
                                                        ? 'لا توجد تقييمات'
                                                        : 'No ratings yet' }}
                                                @endif
                                            </small>

                                        </p>

                                    </td>

                                    {{-- السعر اليومي --}}
                                    <td class="price">

                                        <p class="btn-custom">
                                            <a href="{{ route('orders.checkout', $product) }}">
                                                {{ __('messages.rent_a_car') }}
                                            </a>
                                        </p>

                                        <div class="price-rate">
                                            <h3>
                                                <span class="num">
                                                    <small class="currency">$</small>
                                                    {{ number_format((float) $product->daily_price, 2) }}
                                                </span>

                                                <span class="per">
                                                    {{ app()->getLocale() === 'ar' ? 'لليوم' : 'Per Day' }}
                                                </span>
                                            </h3>

                                            <span class="subheading">
                                                {{ app()->getLocale() === 'ar'
                                                    ? 'السعر اليومي للإيجار'
                                                    : 'Daily rental price' }}
                                            </span>
                                        </div>

                                    </td>

                                    {{-- السعر الأسبوعي --}}
                                    <td class="price">

                                        <p class="btn-custom">
                                            <a href="{{ route('orders.checkout', $product) }}">
                                                {{ __('messages.rent_a_car') }}
                                            </a>
                                        </p>

                                        <div class="price-rate">
                                            <h3>
                                                <span class="num">
                                                    @if ($product->weekly_price !== null)
                                                        <small class="currency">$</small>
                                                        {{ number_format((float) $product->weekly_price, 2) }}
                                                    @else
                                                        —
                                                    @endif
                                                </span>

                                                <span class="per">
                                                    {{ app()->getLocale() === 'ar' ? 'للأسبوع' : 'Per Week' }}
                                                </span>
                                            </h3>

                                            <span class="subheading">
                                                {{ app()->getLocale() === 'ar'
                                                    ? 'السعر الأسبوعي للإيجار'
                                                    : 'Weekly rental price' }}
                                            </span>
                                        </div>

                                    </td>

                                    {{-- السعر الشهري --}}
                                    <td class="price">

                                        <p class="btn-custom">
                                            <a href="{{ route('orders.checkout', $product) }}">
                                                {{ __('messages.rent_a_car') }}
                                            </a>
                                        </p>

                                        <div class="price-rate">
                                            <h3>
                                                <span class="num">
                                                    @if ($product->monthly_price !== null)
                                                        <small class="currency">$</small>
                                                        {{ number_format((float) $product->monthly_price, 2) }}
                                                    @else
                                                        —
                                                    @endif
                                                </span>

                                                <span class="per">
                                                    {{ __('messages.per_month') }}
                                                </span>
                                            </h3>

                                            <span class="subheading">
                                                {{ app()->getLocale() === 'ar'
                                                    ? 'السعر الشهري للإيجار'
                                                    : 'Monthly rental price' }}
                                            </span>
                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        {{ app()->getLocale() === 'ar'
                                            ? 'لا توجد سيارات متاحة للإيجار حاليًا.'
                                            : 'No cars are currently available for rent.' }}
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

<footer class="ftco-footer ftco-bg-dark ftco-section">

    <div class="container">

        <div class="row mb-5">

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">

                    <h2 class="ftco-heading-2">
                        <a href="#" class="logo">Car<span>book</span></a>
                    </h2>

                    <p>{{ __('messages.footer_about_text') }}</p>

                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate">
                            <a href="#"><span class="icon-twitter"></span></a>
                        </li>
                        <li class="ftco-animate">
                            <a href="#"><span class="icon-facebook"></span></a>
                        </li>
                        <li class="ftco-animate">
                            <a href="#"><span class="icon-instagram"></span></a>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">

                    <h2 class="ftco-heading-2">
                        {{ __('messages.information') }}
                    </h2>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.about') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.services') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.terms_and_conditions') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.best_price_guarantee') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.privacy_cookies_policy') }}
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">

                    <h2 class="ftco-heading-2">
                        {{ __('messages.customer_support') }}
                    </h2>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.faq') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.payment_option') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.booking_tips') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.how_it_works') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 d-block">
                                {{ __('messages.contact_us') }}
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">

                    <h2 class="ftco-heading-2">
                        {{ __('messages.have_questions') }}
                    </h2>

                    <div class="block-23 mb-3">
                        <ul>

                            <li>
                                <span class="icon icon-map-marker"></span>
                                <span class="text">
                                    {{ __('messages.company_address') }}
                                </span>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">
                                        {{ __('messages.company_phone') }}
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="icon icon-envelope"></span>
                                    <span class="text">
                                        {{ __('messages.company_email') }}
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    {{ __('messages.copyright') }}
                    &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    {{ __('messages.all_rights_reserved') }}
                </p>

            </div>
        </div>

    </div>

</footer>

@endsection

