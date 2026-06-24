@extends('layouts.guest')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{ asset('images/image_1.jpg') }}');"
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
                        {{ __('messages.about_us') }}
                        <i class="ion-ios-arrow-forward"></i>
                    </span>
                </p>

                <h1 class="mb-3 bread">{{ __('messages.about_us') }}</h1>

            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">

            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                style="background-image: url('{{ asset('images/about.jpg') }}');">
            </div>

            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">

                    <span class="subheading">{{ __('messages.about_us') }}</span>

                    <h2 class="mb-4">{{ __('messages.welcome_to_carbook') }}</h2>

                    <p>{{ __('messages.about_page_text_1') }}</p>

                    <p>{{ __('messages.about_page_text_2') }}</p>

                    <p>
                        <a href="{{ route('cars') }}" class="btn btn-primary py-3 px-4">
                            {{ __('messages.search_vehicle') }}
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-intro"
    style="background-image: url('{{ asset('images/bg_3.jpg') }}');">

    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">

                <h2 class="mb-3">
                    {{ __('messages.earn_with_us_text') }}
                </h2>

                <a href="#" class="btn btn-primary btn-lg">
                    {{ __('messages.become_a_driver') }}
                </a>

            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section bg-light">
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">{{ __('messages.testimonial') }}</span>
                <h2 class="mb-3">{{ __('messages.happy_clients') }}</h2>
            </div>
        </div>

        <div class="row ftco-animate">
            <div class="col-md-12">

                <div class="carousel-testimony owl-carousel ftco-owl">

                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">

                            <div class="user-img mb-2"
                                style="background-image: url('{{ asset('images/person_1.jpg') }}')">
                            </div>

                            <div class="text pt-4">
                                <p class="mb-4">{{ __('messages.testimonial_text') }}</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">{{ __('messages.marketing_manager') }}</span>
                            </div>

                        </div>
                    </div>


                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">

                            <div class="user-img mb-2"
                                style="background-image: url('{{ asset('images/person_2.jpg') }}')">
                            </div>

                            <div class="text pt-4">
                                <p class="mb-4">{{ __('messages.testimonial_text') }}</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">{{ __('messages.interface_designer') }}</span>
                            </div>

                        </div>
                    </div>


                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">

                            <div class="user-img mb-2"
                                style="background-image: url('{{ asset('images/person_3.jpg') }}')">
                            </div>

                            <div class="text pt-4">
                                <p class="mb-4">{{ __('messages.testimonial_text') }}</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">{{ __('messages.ui_designer') }}</span>
                            </div>

                        </div>
                    </div>

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
                        <a href="{{ route('welcome') }}" class="logo">Car<span>book</span></a>
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
                        <li><a href="{{ route('about') }}" class="py-2 d-block">{{ __('messages.about') }}</a></li>
                        <li><a href="{{ route('services') }}" class="py-2 d-block">{{ __('messages.services') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ __('messages.terms_conditions') }}</a></li>
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
                        <li><a href="{{ route('contact') }}" class="py-2 d-block">{{ __('messages.contact_us') }}</a></li>
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
                    {{ __('messages.footer_copyright') }}
                </p>
            </div>
        </div>

    </div>
</footer>

@endsection
