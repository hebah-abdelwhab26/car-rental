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
              {{ __('messages.home') }} <i class="ion-ios-arrow-forward"></i>
            </a>
          </span>
          <span>{{ __('messages.contact') }} <i class="ion-ios-arrow-forward"></i></span>
        </p>

        <h1 class="mb-3 bread">{{ __('messages.contact_us') }}</h1>

      </div>
    </div>
  </div>
</section>


<section class="ftco-section contact-section">
  <div class="container">

    <div class="row d-flex mb-5 contact-info">

      <div class="col-md-4">
        <div class="row mb-5">

          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-map-o"></span>
              </div>
              <p>
                <span>{{ __('messages.address') }}:</span>
                {{ __('messages.company_address') }}
              </p>
            </div>
          </div>

          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-mobile-phone"></span>
              </div>
              <p>
                <span>{{ __('messages.phone') }}:</span>
                <a href="tel:{{ __('messages.company_phone') }}">{{ __('messages.company_phone') }}</a>
              </p>
            </div>
          </div>

          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-envelope-o"></span>
              </div>
              <p>
                <span>{{ __('messages.email') }}:</span>
                <a href="mailto:{{ __('messages.company_email') }}">{{ __('messages.company_email') }}</a>
              </p>
            </div>
          </div>

        </div>
      </div>


      <div class="col-md-8 block-9 mb-md-5">

        <form action="#" method="POST" class="bg-light p-5 contact-form">
          @csrf

          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="{{ __('messages.your_name') }}">
          </div>

          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="{{ __('messages.your_email') }}">
          </div>

          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="{{ __('messages.subject') }}">
          </div>

          <div class="form-group">
            <textarea name="message" cols="30" rows="7"
                      class="form-control"
                      placeholder="{{ __('messages.message') }}"></textarea>
          </div>

          <div class="form-group">
            <input type="submit" value="{{ __('messages.send_message') }}" class="btn btn-primary py-3 px-5">
          </div>

        </form>

      </div>

    </div>


    {{-- MAP --}}
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div id="map" class="bg-white rounded overflow-hidden shadow-sm" style="width: 100%; height: 420px;">
          <iframe
              src="https://www.google.com/maps?q=Alexandria,Egypt&output=embed"
              width="100%"
              height="100%"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
          </iframe>
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
                <a href="tel:{{ __('messages.company_phone') }}">
                  <span class="icon icon-phone"></span>
                  <span class="text">{{ __('messages.company_phone') }}</span>
                </a>
              </li>
              <li>
                <a href="mailto:{{ __('messages.company_email') }}">
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
          &copy; {{ date('Y') }} {{ __('messages.all_rights_reserved') }}
        </p>
      </div>
    </div>
  </div>
</footer>

@endsection
