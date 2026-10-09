@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">

            <div class="row align-items-center g-3">

                <div class="col-md-6">
                    <h4 class="mb-0">
                        {{ __('messages.locations') }}
                    </h4>
                </div>

                <div class="col-md-6 text-md-end">

                    <a href="{{ route('locations.create') }}"
                       class="btn btn-success w-100 w-md-auto">

                        <i class="fas fa-plus-circle me-1"></i>

                        {{ __('messages.add_location') }}

                    </a>

                </div>

            </div>

        </div>


        <div class="card-body">

            @if(session('message'))

                <div class="alert alert-success">

                    {{ session('message') }}

                </div>

            @endif


            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle text-center">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>{{ __('messages.city') }}</th>

                            <th>{{ __('messages.area') }}</th>

                            <th>{{ __('messages.address') }}</th>

                            <th>{{ __('messages.latitude') }}</th>

                            <th>{{ __('messages.longitude') }}</th>

                            <th style="min-width:180px">

                                {{ __('messages.actions') }}

                            </th>

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

                                    <div class="d-grid d-md-flex gap-2 justify-content-center">

                                        <a href="{{ route('locations.edit', $location->id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="fas fa-edit"></i>

                                            <span class="ms-1">

                                                {{ __('messages.edit') }}

                                            </span>

                                        </a>


                                        <form action="{{ route('locations.destroy', $location->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm w-100"
                                                    onclick="return confirm('{{ __('messages.delete_location_confirm') }}')">

                                                <i class="fas fa-trash"></i>

                                                <span class="ms-1">

                                                    {{ __('messages.delete') }}

                                                </span>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-4">

                                    {{ __('messages.no_locations_found') }}

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
