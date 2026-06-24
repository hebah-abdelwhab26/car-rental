@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header">
            <h3 class="mb-0">{{ __('messages.add_new_car') }}</h3>
        </div>


        <div class="card-body">


            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>
            @endif



            <form action="{{ route('products.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <div class="row">


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.category') }}
                        </label>

                        <select name="category_id" class="form-control">

                            <option value="">
                                {{ __('messages.select_category') }}
                            </option>


                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->title_en }}

                                </option>

                            @endforeach

                        </select>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.location') }}
                        </label>

                        <select name="location_id" class="form-control">

                            <option value="">
                                {{ __('messages.select_location') }}
                            </option>


                            @foreach($locations as $location)

                                <option value="{{ $location->id }}"
                                    {{ old('location_id') == $location->id ? 'selected' : '' }}>

                                    {{ $location->city }} - {{ $location->area }}

                                </option>

                            @endforeach

                        </select>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.car_name') }}
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.brand') }}
                        </label>

                        <input type="text"
                               name="brand"
                               class="form-control"
                               value="{{ old('brand') }}">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.model') }}
                        </label>

                        <input type="text"
                               name="model"
                               class="form-control"
                               value="{{ old('model') }}">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.year') }}
                        </label>

                        <input type="number"
                               name="year"
                               class="form-control"
                               value="{{ old('year') }}">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.color') }}
                        </label>

                        <input type="text"
                               name="color"
                               class="form-control"
                               value="{{ old('color') }}">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.seats') }}
                        </label>

                        <input type="number"
                               name="seats"
                               class="form-control"
                               value="{{ old('seats') }}">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.transmission') }}
                        </label>


                        <select name="transmission" class="form-control">

                            <option value="automatic">
                                {{ __('messages.automatic') }}
                            </option>

                            <option value="manual">
                                {{ __('messages.manual') }}
                            </option>

                        </select>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.fuel_type') }}
                        </label>


                        <select name="fuel_type" class="form-control">

                            <option value="gasoline">
                                {{ __('messages.gasoline') }}
                            </option>

                            <option value="diesel">
                                {{ __('messages.diesel') }}
                            </option>

                            <option value="hybrid">
                                {{ __('messages.hybrid') }}
                            </option>

                            <option value="electric">
                                {{ __('messages.electric') }}
                            </option>

                        </select>

                    </div>



                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            {{ __('messages.daily_price') }}
                        </label>

                        <input type="number"
                               step="0.01"
                               name="daily_price"
                               class="form-control">

                    </div>



                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            {{ __('messages.weekly_price') }}
                        </label>

                        <input type="number"
                               step="0.01"
                               name="weekly_price"
                               class="form-control">

                    </div>



                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            {{ __('messages.monthly_price') }}
                        </label>

                        <input type="number"
                               step="0.01"
                               name="monthly_price"
                               class="form-control">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.deposit_amount') }}
                        </label>

                        <input type="number"
                               step="0.01"
                               name="deposit_amount"
                               class="form-control">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            {{ __('messages.main_image') }}
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>



                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            {{ __('messages.gallery_images') }}
                        </label>

                        <input type="file"
                               name="car_images[]"
                               multiple
                               class="form-control">


                        <small class="text-muted">
                            {{ __('messages.select_multiple_images') }}
                        </small>

                    </div>



                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            {{ __('messages.product_description') }}
                        </label>


                        <textarea name="description"
                                  rows="5"
                                  class="form-control">{{ old('description') }}</textarea>

                    </div>



                    <div class="col-md-12">

                        <button class="btn btn-success">
                            {{ __('messages.save') }}
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
