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
                                    {{ __('messages.per_hour_rate') }}
                                </th>

                                <th class="bg-dark heading">
                                    {{ __('messages.per_day_rate') }}
                                </th>

                                <th class="bg-black heading">
                                    {{ __('messages.leasing') }}
                                </th>

                            </tr>

                        </thead>



                        <tbody>

                            @for ($i = 1; $i <= 6; $i++)

                            <tr>

                                <td class="car-image">

                                    <div class="img"
                                        style="background-image:url('{{ asset('images/car-'.$i.'.jpg') }}');">
                                    </div>

                                </td>



                                <td class="product-name">

                                    <h3>{{ __('messages.sample_car_name') }}</h3>

                                    <p class="mb-0 rated">

                                        <span>{{ __('messages.rated') }}</span>

                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>

                                    </p>

                                </td>



                                <td class="price">

                                    <p class="btn-custom">
                                        <a href="#">{{ __('messages.rent_a_car') }}</a>
                                    </p>

                                    <div class="price-rate">

                                        <h3>

                                            <span class="num">

                                                <small class="currency">$</small>
                                                10.99

                                            </span>

                                            <span class="per">{{ __('messages.per_hour') }}</span>

                                        </h3>

                                        <span class="subheading">
                                            {{ __('messages.fuel_surcharge_hourly') }}
                                        </span>

                                    </div>

                                </td>



                                <td class="price">

                                    <p class="btn-custom">
                                        <a href="#">{{ __('messages.rent_a_car') }}</a>
                                    </p>

                                    <div class="price-rate">

                                        <h3>

                                            <span class="num">

                                                <small class="currency">$</small>
                                                60.99

                                            </span>

                                            <span class="per">{{ __('messages.per_day') }}</span>

                                        </h3>

                                        <span class="subheading">
                                            {{ __('messages.fuel_surcharge_hourly') }}
                                        </span>

                                    </div>

                                </td>



                                <td class="price">

                                    <p class="btn-custom">
                                        <a href="#">{{ __('messages.rent_a_car') }}</a>
                                    </p>

                                    <div class="price-rate">

                                        <h3>

                                            <span class="num">

                                                <small class="currency">$</small>
                                                995.99

                                            </span>

                                            <span class="per">{{ __('messages.per_month') }}</span>

                                        </h3>

                                        <span class="subheading">
                                            {{ __('messages.fuel_surcharge_hourly') }}
                                        </span>

                                    </div>

                                </td>

                            </tr>

                            @endfor

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
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">{{ __('messages.information') }}</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">{{ __('messages.about') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.services') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.terms_and_conditions') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.best_price_guarantee') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.privacy_cookies_policy') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ __('messages.customer_support') }}</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">{{ __('messages.faq') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.payment_option') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.booking_tips') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.how_it_works') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.contact_us') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ __('messages.have_questions') }}</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <span class="icon icon-map-marker"></span>
                                <span class="text">{{ __('messages.company_address') }}</span>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">{{ __('messages.company_phone') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon icon-envelope"></span>
                                    <span class="text">{{ __('messages.company_email') }}</span>
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
                    {{ __('messages.copyright') }} &copy; <script>document.write(new Date().getFullYear());</script>
                    {{ __('messages.all_rights_reserved') }}
                </p>
            </div>
        </div>
    </div>
</footer>

@endsection


