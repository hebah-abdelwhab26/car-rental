@extends('layouts.app')

@section('content')

<div class="container">

<div class="card">

    <div class="card-header">
        <h3>{{ __('messages.add_location') }}</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('locations.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">{{ __('messages.city') }}</label>
                <input type="text"
                       name="city"
                       class="form-control"
                       value="{{ old('city') }}">
                @error('city')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.area') }}</label>
                <input type="text"
                       name="area"
                       class="form-control"
                       value="{{ old('area') }}">
                @error('area')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.address') }}</label>
                <input type="text"
                       name="address"
                       class="form-control"
                       value="{{ old('address') }}">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.latitude') }}</label>
                <input type="text"
                       name="latitude"
                       class="form-control"
                       value="{{ old('latitude') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.longitude') }}</label>
                <input type="text"
                       name="longitude"
                       class="form-control"
                       value="{{ old('longitude') }}">
            </div>

            <button type="submit" class="btn btn-success">
                {{ __('messages.save') }}
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
