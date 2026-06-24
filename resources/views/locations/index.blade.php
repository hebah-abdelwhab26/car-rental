@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2>{{ __('messages.locations') }}</h2>
        </div>

        <div class="col-md-6 text-end">
            <a href="{{ route('locations.create') }}" class="btn btn-primary">
                {{ __('messages.add_location') }}
            </a>
        </div>

    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('messages.city') }}</th>
                <th>{{ __('messages.area') }}</th>
                <th>{{ __('messages.address') }}</th>
                <th>{{ __('messages.latitude') }}</th>
                <th>{{ __('messages.longitude') }}</th>
                <th width="180">{{ __('messages.actions') }}</th>
            </tr>
        </thead>

        <tbody>

            @forelse($result as $location)

                <tr>

                    <td>{{ $location->id }}</td>

                    <td>{{ $location->city }}</td>

                    <td>{{ $location->area }}</td>

                    <td>{{ $location->address }}</td>

                    <td>{{ $location->latitude }}</td>

                    <td>{{ $location->longitude }}</td>

                    <td>

                        <a href="{{ route('locations.edit', $location->id) }}"
                           class="btn btn-warning btn-sm">
                            {{ __('messages.edit') }}
                        </a>

                        <form action="{{ route('locations.destroy', $location->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('{{ __('messages.delete_location_confirm') }}')">
                                {{ __('messages.delete') }}
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="text-center">
                        {{ __('messages.no_locations_found') }}
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection

