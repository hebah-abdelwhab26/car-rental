@extends('layouts.guest')
@section('content')

<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('images/car-1.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">{{ __('messages.fast_easy_way_to_rent_a_car') }}</h1>
          <p style="font-size: 18px;">
            {{ __('messages.hero_home_description') }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12 featured-top">
        <div class="row no-gutters">
          <div class="col-md-4 d-flex align-items-center">
            <form action="#" class="request-form ftco-animate bg-primary">
              <h2>{{ __('messages.make_your_trip') }}</h2>

              <div class="form-group">
                <label class="label">{{ __('messages.pickup_location') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('messages.pickup_location_placeholder') }}">
              </div>

              <div class="form-group">
                <label class="label">{{ __('messages.dropoff_location') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('messages.dropoff_location_placeholder') }}">
              </div>

              <div class="d-flex">
                <div class="form-group mr-2">
                  <label class="label">{{ __('messages.pickup_date') }}</label>
                  <input type="text" class="form-control" id="book_pick_date" placeholder="{{ __('messages.date') }}">
                </div>
                <div class="form-group ml-2">
                  <label class="label">{{ __('messages.dropoff_date') }}</label>
                  <input type="text" class="form-control" id="book_off_date" placeholder="{{ __('messages.date') }}">
                </div>
              </div>

              <div class="form-group">
                <label class="label">{{ __('messages.pickup_time') }}</label>
                <input type="text" class="form-control" id="time_pick" placeholder="{{ __('messages.time') }}">
              </div>

              <div class="form-group">
                <input type="submit" value="{{ __('messages.rent_a_car_now') }}" class="btn btn-secondary py-3 px-4">
              </div>
            </form>
          </div>

          <div class="col-md-8 d-flex align-items-center">
            <div class="services-wrap rounded-right w-100">
              <h3 class="heading-section mb-4">{{ __('messages.better_way_to_rent_your_perfect_cars') }}</h3>

              <div class="row d-flex mb-4">
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                      <span class="flaticon-route"></span>
                    </div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">{{ __('messages.choose_your_pickup_location') }}</h3>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                      <span class="flaticon-handshake"></span>
                    </div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">{{ __('messages.select_the_best_deal') }}</h3>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                      <span class="flaticon-rent"></span>
                    </div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">{{ __('messages.reserve_your_rental_car') }}</h3>
                    </div>
                  </div>
                </div>
              </div>

              <p>
                <a href="#" class="btn btn-primary py-3 px-4">
                  {{ __('messages.reserve_your_perfect_car') }}
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- FEATURED CARS -->
<section class="ftco-section bg-light">
  <div class="container">

    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section">
        <span class="subheading">{{ __('messages.what_we_offer') }}</span>
        <h2>{{ __('messages.featured_vehicles') }}</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="carousel-car owl-carousel">

          @foreach($featuredProducts as $product)
            <div class="item">
              <div class="car-wrap">

                <div class="img"
                     style="background-image:url('{{ asset('img/product/'.$product->image) }}'); height:250px;">
                </div>

                <div class="text">
                  <h2>{{ $product->name }}</h2>

                  <div class="d-flex">
                    <span>
                      {{ app()->getLocale() == 'ar'
                          ? ($product->category->title_ar ?? __('messages.uncategorized'))
                          : ($product->category->title_en ?? __('messages.uncategorized')) }}
                    </span>

                    <span class="ml-auto">
                      ${{ $product->daily_price }}/{{ __('messages.day') }}
                    </span>
                  </div>

                  <p class="d-flex">
                    <a href="{{ route('orders.checkout', $product->id) }}" class="btn btn-primary mr-2">
                      {{ __('messages.book_now') }}
                    </a>

                    <a href="{{ route('cars.show', $product->id) }}" class="btn btn-secondary">
                      {{ __('messages.details') }}
                    </a>
                  </p>
                </div>

              </div>
            </div>
          @endforeach

        </div>
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

          <p>{{ __('messages.about_home_paragraph_1') }}</p>
          <p>{{ __('messages.about_home_paragraph_2') }}</p>

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
            <span class="flaticon-wedding-car"></span>
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">{{ __('messages.wedding_ceremony') }}</h3>
            <p>{{ __('messages.service_desc') }}</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-transportation"></span>
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">{{ __('messages.city_transfer') }}</h3>
            <p>{{ __('messages.service_desc') }}</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-car"></span>
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">{{ __('messages.airport_transfer') }}</h3>
            <p>{{ __('messages.service_desc') }}</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-transportation"></span>
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">{{ __('messages.whole_city_tour') }}</h3>
            <p>{{ __('messages.service_desc') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url('{{ asset('images/bg_3.jpg') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-6 heading-section heading-section-white ftco-animate">
        <h2 class="mb-3">{{ __('messages.do_you_want_to_earn_with_us') }}</h2>
        <a href="#" class="btn btn-primary btn-lg">{{ __('messages.become_a_driver') }}</a>
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
              <div class="user-img mb-2" style="background-image: url('{{ asset('images/person_1.jpg') }}')"></div>
              <div class="text pt-4">
                <p class="mb-4">{{ __('messages.testimonial_text') }}</p>
                <p class="name">Roger Scott</p>
                <span class="position">{{ __('messages.marketing_manager') }}</span>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url('{{ asset('images/person_2.jpg') }}')"></div>
              <div class="text pt-4">
                <p class="mb-4">{{ __('messages.testimonial_text') }}</p>
                <p class="name">Roger Scott</p>
                <span class="position">{{ __('messages.interface_designer') }}</span>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url('{{ asset('images/person_3.jpg') }}')"></div>
              <div class="text pt-4">
                <p class="mb-4">{{ __('messages.testimonial_text') }}</p>
                <p class="name">Roger Scott</p>
                <span class="position">{{ __('messages.ui_designer') }}</span>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url('{{ asset('images/person_1.jpg') }}')"></div>
              <div class="text pt-4">
                <p class="mb-4">{{ __('messages.testimonial_text') }}</p>
                <p class="name">Roger Scott</p>
                <span class="position">{{ __('messages.web_developer') }}</span>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url('{{ asset('images/person_1.jpg') }}')"></div>
              <div class="text pt-4">
                <p class="mb-4">{{ __('messages.testimonial_text') }}</p>
                <p class="name">Roger Scott</p>
                <span class="position">{{ __('messages.system_analyst') }}</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">{{ __('messages.blog') }}</span>
        <h2>{{ __('messages.recent_blog') }}</h2>
      </div>
    </div>

    <div class="row d-flex">
      @for($i = 1; $i <= 3; $i++)
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <a href="#" class="block-20" style="background-image: url('{{ asset('images/image_'.$i.'.jpg') }}');"></a>
            <div class="text pt-4">
              <div class="meta mb-3">
                <div><a href="#">Oct. 29, 2019</a></div>
                <div><a href="#">{{ __('messages.admin') }}</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-2">
                <a href="#">{{ __('messages.blog_post_title') }}</a>
              </h3>
              <p><a href="#" class="btn btn-primary">{{ __('messages.read_more') }}</a></p>
            </div>
          </div>
        </div>
      @endfor
    </div>
  </div>
</section>

<section class="ftco-counter ftco-section img bg-light" id="section-counter">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="60">0</strong>
            <span>{{ __('messages.year_experienced') }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="1090">0</strong>
            <span>{{ __('messages.total_cars') }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="2590">0</strong>
            <span>{{ __('messages.happy_customers') }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text d-flex align-items-center">
            <strong class="number" data-number="67">0</strong>
            <span>{{ __('messages.total_branches') }}</span>
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
                <span class="text">{{ __('messages.footer_address') }}</span>
              </li>
              <li>
                <a href="#">
                  <span class="icon icon-phone"></span>
                  <span class="text">+2 392 3929 210</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon icon-envelope"></span>
                  <span class="text">info@yourdomain.com</span>
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
          {{ __('messages.copyright') }} &copy;<script>document.write(new Date().getFullYear());</script>
          {{ __('messages.all_rights_reserved') }}
        </p>
      </div>
    </div>
  </div>
</footer>

@endsection

