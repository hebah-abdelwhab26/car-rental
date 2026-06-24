@extends('layouts.app')

@section('content')

<div class="container">

<div class="card">

    <div class="card-header">
        <h3>{{ __('messages.edit_location') }}</h3>
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

        <form action="{{ route('locations.update', $result->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">{{ __('messages.city') }}</label>
                <input type="text"
                       name="city"
                       class="form-control"
                       value="{{ old('city', $result->city) }}">

                @error('city')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.area') }}</label>
                <input type="text"
                       name="area"
                       class="form-control"
                       value="{{ old('area', $result->area) }}">

                @error('area')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.address') }}</label>
                <input type="text"
                       name="address"
                       class="form-control"
                       value="{{ old('address', $result->address) }}">

                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.latitude') }}</label>
                <input type="text"
                       name="latitude"
                       class="form-control"
                       value="{{ old('latitude', $result->latitude) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.longitude') }}</label>
                <input type="text"
                       name="longitude"
                       class="form-control"
                       value="{{ old('longitude', $result->longitude) }}">
            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('messages.update') }}
            </button>

            <a href="{{ route('locations.index') }}"
               class="btn btn-secondary">
                {{ __('messages.back') }}
            </a>

        </form>

    </div>

</div>

</div>

@endsection
