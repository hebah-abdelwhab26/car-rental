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
                        <a href="{{ url('/') }}">
                            {{ __('messages.home') }}
                            <i class="ion-ios-arrow-forward"></i>
                        </a>
                    </span>

                    <span>
                        {{ __('messages.services') }}
                        <i class="ion-ios-arrow-forward"></i>
                    </span>
                </p>

                <h1 class="mb-3 bread">{{ __('messages.our_services') }}</h1>

            </div>
        </div>
    </div>
</section>


<section class="ftco-section">

    <div class="container">

        <div class="row justify-content-center mb-5">

            <div class="col-md-7 text-center heading-section ftco-animate">

                <span class="subheading">{{ __('messages.services') }}</span>

                <h2 class="mb-3">{{ __('messages.our_latest_services') }}</h2>

            </div>
        </div>


        <div class="row">

            <div class="col-md-3">

                <div class="services services-2 w-100 text-center">

                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-route"></span>
                    </div>

                    <div class="text w-100">

                        <h3 class="heading mb-2">{{ __('messages.wedding_ceremony') }}</h3>

                        <p>
                            {{ __('messages.service_description_short') }}
                        </p>

                    </div>
                </div>
            </div>


            <div class="col-md-3">

                <div class="services services-2 w-100 text-center">

                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-route"></span>
                    </div>

                    <div class="text w-100">

                        <h3 class="heading mb-2">{{ __('messages.city_transfer') }}</h3>

                        <p>
                            {{ __('messages.service_description_short') }}
                        </p>

                    </div>
                </div>
            </div>


            <div class="col-md-3">

                <div class="services services-2 w-100 text-center">

                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-route"></span>
                    </div>

                    <div class="text w-100">

                        <h3 class="heading mb-2">{{ __('messages.airport_transfer') }}</h3>

                        <p>
                            {{ __('messages.service_description_short') }}
                        </p>

                    </div>
                </div>
            </div>


            <div class="col-md-3">

                <div class="services services-2 w-100 text-center">

                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-route"></span>
                    </div>

                    <div class="text w-100">

                        <h3 class="heading mb-2">{{ __('messages.whole_city_tour') }}</h3>

                        <p>
                            {{ __('messages.service_description_short') }}
                        </p>

                    </div>
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


<footer class="ftco-footer ftco-bg-dark ftco-section">

    <div class="container">

        <div class="row mb-5">

            <div class="col-md">

                <div class="ftco-footer-widget mb-4">

                    <h2 class="ftco-heading-2">
                        <a href="#" class="logo">
                            Car<span>book</span>
                        </a>
                    </h2>

                    <p>
                        {{ __('messages.footer_about_text_short') }}
                    </p>

                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">

                        <li class="ftco-animate">
                            <a href="#">
                                <span class="icon-twitter"></span>
                            </a>
                        </li>

                        <li class="ftco-animate">
                            <a href="#">
                                <span class="icon-facebook"></span>
                            </a>
                        </li>

                        <li class="ftco-animate">
                            <a href="#">
                                <span class="icon-instagram"></span>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>

        </div>
    </div>

</footer>

@endsection


