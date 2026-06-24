@extends('layouts.guest')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-wrap hero-wrap-2"
         style="background-image: url('{{ $product->image ? asset('img/product/' . $product->image) : asset('images/bg_3.jpg') }}');">
    <div class="overlay"></div>

    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <h1 class="mb-3 bread">{{ $product->name }}</h1>

                {{-- Rating Summary --}}
                <div style="color: gold; font-size: 18px;">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($avgRating))
                            ★
                        @else
                            ☆
                        @endif
                    @endfor

                    <span style="color:#fff; font-size:14px;">
                        ({{ number_format($avgRating, 1) }} / 5)
                        -
                        {{ $ratingCount }} {{ __('messages.reviews') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DETAILS SECTION --}}
<section class="ftco-section">
    <div class="container">
        <div class="row">

            {{-- LEFT SIDE --}}
            <div class="col-md-7">

                {{-- MAIN IMAGE --}}
                <div class="mb-4">
                    @if($product->image)
                        <img src="{{ asset('img/product/' . $product->image) }}"
                             class="img-fluid rounded shadow"
                             alt="{{ $product->name }}"
                             style="width:100%; max-height:450px; object-fit:cover;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light border rounded shadow"
                             style="width:100%; height:450px;">
                            <span class="text-muted">{{ __('messages.no_main_image') }}</span>
                        </div>
                    @endif
                </div>

                {{-- GALLERY IMAGES --}}
                @if($product->images && $product->images->count() > 0)
                    <div class="mb-5">
                        <h4 class="mb-3">{{ __('messages.car_gallery') }}</h4>

                        <div class="row">
                            @foreach($product->images->sortBy('sort_order') as $img)
                                <div class="col-md-4 col-sm-6 mb-3">
                                    <div class="border rounded shadow-sm p-2 bg-white h-100">
                                        <img src="{{ asset('img/product/gallery/' . $img->image) }}"
                                             class="img-fluid rounded"
                                             alt="{{ __('messages.car_gallery') }}"
                                             style="width:100%; height:180px; object-fit:cover;">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- COMMENTS SECTION --}}
                <div class="mt-5">
                    <h4 class="mb-4">{{ __('messages.comments') }}</h4>

                    @forelse($product->comments as $comment)
                        <div class="border-bottom pb-3 mb-3">
                            <strong>{{ $comment->user->name ?? __('messages.user') }}</strong>

                            <div style="color:gold; font-size:16px;">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= $comment->rating ? '★' : '☆' }}
                                @endfor
                            </div>

                            <p class="mb-1 mt-2">{{ $comment->comment }}</p>
                        </div>
                    @empty
                        <p class="text-muted">{{ __('messages.no_comments_yet') }}</p>
                    @endforelse

                    {{-- ADD COMMENT --}}
                    @auth
                        <hr class="my-4">

                        <h5 class="mb-3">{{ __('messages.add_comment') }}</h5>

                        <form method="POST" action="{{ route('cars.comment', $product->id) }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="rating">{{ __('messages.rating') }}</label>
                                <select name="rating" id="rating" class="form-control">
                                    <option value="5">5 ⭐</option>
                                    <option value="4">4 ⭐</option>
                                    <option value="3">3 ⭐</option>
                                    <option value="2">2 ⭐</option>
                                    <option value="1">1 ⭐</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="comment">{{ __('messages.comment') }}</label>
                                <textarea name="comment"
                                          id="comment"
                                          class="form-control"
                                          rows="4"
                                          placeholder="{{ __('messages.write_your_comment') }}">{{ old('comment') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('messages.submit') }}
                            </button>
                        </form>
                    @else
                        <hr class="my-4">
                        <p class="text-muted">
                            {{ __('messages.please_login_to_comment') }}
                            <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </p>
                    @endauth
                </div>
            </div>

            {{-- RIGHT SIDE --}}
            <div class="col-md-5">
                <div class="car-details-box bg-white shadow rounded p-4">

                    <h2 class="mb-3">{{ $product->name }}</h2>
                    <hr>

                    <p>
                        <strong>{{ __('messages.category_label') }}:</strong>
                        {{ app()->getLocale() == 'ar'
                            ? ($product->category->title_ar ?? '-')
                            : ($product->category->title_en ?? '-') }}
                    </p>

                    <p>
                        <strong>{{ __('messages.location_label') }}:</strong>
                        {{ $product->location->city ?? '-' }}
                        {{ !empty($product->location->area) ? ' - ' . $product->location->area : '' }}
                    </p>

                    <p>
                        <strong>{{ __('messages.brand_label') }}:</strong>
                        {{ $product->brand ?? '-' }}
                    </p>

                    <p>
                        <strong>{{ __('messages.model_label') }}:</strong>
                        {{ $product->model ?? '-' }}
                    </p>

                    <p>
                        <strong>{{ __('messages.year_label') }}:</strong>
                        {{ $product->year ?? '-' }}
                    </p>

                    <p>
                        <strong>{{ __('messages.color_label') }}:</strong>
                        {{ $product->color ?? '-' }}
                    </p>

                    <p>
                        <strong>{{ __('messages.transmission_label') }}:</strong>
                        {{ $product->transmission ? ucfirst($product->transmission) : '-' }}
                    </p>

                    <p>
                        <strong>{{ __('messages.fuel_type_label') }}:</strong>
                        {{ $product->fuel_type ? ucfirst($product->fuel_type) : '-' }}
                    </p>

                    <p>
                        <strong>{{ __('messages.seats_label') }}:</strong>
                        {{ $product->seats ?? '-' }}
                    </p>

                    <p>
                        <strong>{{ __('messages.price_per_day') }}:</strong>
                        ${{ $product->daily_price }}
                    </p>

                    @if($product->weekly_price)
                        <p>
                            <strong>{{ __('messages.price_per_week') }}:</strong>
                            ${{ $product->weekly_price }}
                        </p>
                    @endif

                    @if($product->monthly_price)
                        <p>
                            <strong>{{ __('messages.price_per_month') }}:</strong>
                            ${{ $product->monthly_price }}
                        </p>
                    @endif

                    @if($product->deposit_amount)
                        <p>
                            <strong>{{ __('messages.deposit_amount') }}:</strong>
                            ${{ $product->deposit_amount }}
                        </p>
                    @endif

                    <hr>

                    <h5 class="mb-3">{{ __('messages.description') }}</h5>
                    <p class="text-muted">
                        {{ $product->description ?: __('messages.no_description_available') }}
                    </p>

                    <a href="{{ route('orders.checkout', $product->id) }}"
                       class="btn btn-primary btn-lg mt-3 w-100">
                        {{ __('messages.book_now') }}
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
