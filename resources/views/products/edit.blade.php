@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header">
            <h3 class="mb-0">{{ __('messages.edit_product') }}</h3>
        </div>

        <div class="card-body">

            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Category --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('messages.category') }}</label>

                        <select name="category_id" class="form-control">

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->title_en }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Location --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.location') }}</label>

                        <select name="location_id" class="form-control">

                            @foreach($locations as $location)

                                <option value="{{ $location->id }}"
                                    {{ $product->location_id == $location->id ? 'selected' : '' }}>

                                    {{ $location->city }} - {{ $location->area }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Name --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.name') }}</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $product->name) }}">

                    </div>


                    {{-- Brand --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.brand') }}</label>

                        <input type="text"
                               name="brand"
                               class="form-control"
                               value="{{ old('brand', $product->brand) }}">

                    </div>


                    {{-- Model --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.model') }}</label>

                        <input type="text"
                               name="model"
                               class="form-control"
                               value="{{ old('model', $product->model) }}">

                    </div>


                    {{-- Year --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.year') }}</label>

                        <input type="number"
                               name="year"
                               class="form-control"
                               value="{{ old('year', $product->year) }}">

                    </div>

                                        {{-- Color --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.color') }}</label>

                        <input type="text"
                               name="color"
                               class="form-control"
                               value="{{ old('color', $product->color) }}">

                    </div>


                    {{-- Seats --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.seats') }}</label>

                        <input type="number"
                               name="seats"
                               class="form-control"
                               value="{{ old('seats', $product->seats) }}">

                    </div>


                    {{-- Transmission --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.transmission') }}</label>

                        <select name="transmission" class="form-control">

                            <option value="automatic"
                                {{ old('transmission', $product->transmission) == 'automatic' ? 'selected' : '' }}>

                                {{ __('messages.automatic') }}

                            </option>

                            <option value="manual"
                                {{ old('transmission', $product->transmission) == 'manual' ? 'selected' : '' }}>

                                {{ __('messages.manual') }}

                            </option>

                        </select>

                    </div>


                    {{-- Fuel Type --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.fuel_type') }}</label>

                        <select name="fuel_type" class="form-control">

                            <option value="gasoline"
                                {{ old('fuel_type', $product->fuel_type) == 'gasoline' ? 'selected' : '' }}>

                                {{ __('messages.gasoline') }}

                            </option>

                            <option value="diesel"
                                {{ old('fuel_type', $product->fuel_type) == 'diesel' ? 'selected' : '' }}>

                                {{ __('messages.diesel') }}

                            </option>

                            <option value="hybrid"
                                {{ old('fuel_type', $product->fuel_type) == 'hybrid' ? 'selected' : '' }}>

                                {{ __('messages.hybrid') }}

                            </option>

                            <option value="electric"
                                {{ old('fuel_type', $product->fuel_type) == 'electric' ? 'selected' : '' }}>

                                {{ __('messages.electric') }}

                            </option>

                        </select>

                    </div>


                    {{-- Daily Price --}}
                    <div class="col-md-4 mb-3">

                        <label class="form-label">{{ __('messages.daily_price') }}</label>

                        <input type="number"
                               step="0.01"
                               name="daily_price"
                               class="form-control"
                               value="{{ old('daily_price', $product->daily_price) }}">

                    </div>


                    {{-- Weekly Price --}}
                    <div class="col-md-4 mb-3">

                        <label class="form-label">{{ __('messages.weekly_price') }}</label>

                        <input type="number"
                               step="0.01"
                               name="weekly_price"
                               class="form-control"
                               value="{{ old('weekly_price', $product->weekly_price) }}">

                    </div>


                    {{-- Monthly Price --}}
                    <div class="col-md-4 mb-3">

                        <label class="form-label">{{ __('messages.monthly_price') }}</label>

                        <input type="number"
                               step="0.01"
                               name="monthly_price"
                               class="form-control"
                               value="{{ old('monthly_price', $product->monthly_price) }}">

                    </div>


                    {{-- Deposit Amount --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.deposit_amount') }}</label>

                        <input type="number"
                               step="0.01"
                               name="deposit_amount"
                               class="form-control"
                               value="{{ old('deposit_amount', $product->deposit_amount) }}">

                    </div>


                    {{-- Main Image --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">{{ __('messages.main_image') }}</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>


                    {{-- Current Main Image --}}
                    <div class="col-md-12 mb-3">

                        @if($product->image)

                            <label class="form-label d-block">
                                {{ __('messages.current_main_image') }}
                            </label>

                            <img src="{{ asset('img/product/' . $product->image) }}"
                                 width="180"
                                 class="rounded shadow border">

                        @endif

                    </div>


                    {{-- Gallery Images Upload --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            {{ __('messages.add_new_gallery_images') }}
                        </label>

                        <input type="file"
                               name="car_images[]"
                               class="form-control"
                               multiple>

                        <small class="text-muted">
                            {{ __('messages.select_multiple_images') }}
                        </small>

                    </div>


                    {{-- Current Gallery Images --}}
                    <div class="col-md-12 mb-4">

                        <label class="form-label d-block">
                            {{ __('messages.current_gallery_images') }}
                        </label>


                        <div class="row">

                            @forelse($product->images as $img)

                                <div class="col-md-3 col-sm-4 col-6 mb-3">

                                    <div class="border rounded p-2 text-center shadow-sm h-100">

                                        <img src="{{ asset('img/product/gallery/' . $img->image) }}"
                                             class="img-fluid rounded mb-2"
                                             style="height:150px; object-fit:cover; width:100%;">

                                        <small class="d-block text-muted mb-2">

                                            {{ __('messages.sort') }}:
                                            {{ $img->sort_order }}

                                        </small>


                                        <form action="{{ route('products.gallery.delete', $img->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('{{ __('messages.delete_image_confirm') }}');">

                                            @csrf
                                            @method('DELETE')


                                            <button type="submit"
                                                    class="btn btn-sm btn-danger w-100">

                                                {{ __('messages.delete') }}

                                            </button>

                                        </form>


                                    </div>

                                </div>


                            @empty

                                <div class="col-12">

                                    <div class="alert alert-secondary mb-0">

                                        {{ __('messages.no_gallery_images') }}

                                    </div>

                                </div>


                            @endforelse

                        </div>

                    </div>


                    {{-- Description --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            {{ __('messages.description') }}
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control">{{ old('description', $product->description) }}</textarea>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-md-12">

                        <button type="submit" class="btn btn-primary">

                            {{ __('messages.update_product') }}

                        </button>


                        <a href="{{ route('products.index') }}"
                           class="btn btn-secondary">

                            {{ __('messages.back') }}

                        </a>

                    </div>


                </div>

            </form>


        </div>

    </div>

</div>


@endsection



