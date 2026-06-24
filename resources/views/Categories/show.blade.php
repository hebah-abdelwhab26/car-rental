@extends('layouts.app')

@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-10 m-auto">

            <h5 class="text-center">
                {{ __('messages.user_details') }}
                <span class="badge text-bg-primary"></span>
            </h5>

            <table class="table table-dark text-center">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('messages.title_en') }}</th>
                        <th>{{ __('messages.title_ar') }}</th>
                        <th>{{ __('messages.description_en') }}</th>
                        <th>{{ __('messages.description_ar') }}</th>
                        <th>{{ __('messages.status') }}</th>
                        <th>{{ __('messages.created_at') }}</th>
                        <th>{{ __('messages.operation') }}</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->title_en }}</td>
                        <td>{{ $result->title_ar }}</td>
                        <td>{{ $result->description_en }}</td>
                        <td>{{ $result->description_ar }}</td>
                        <td>{{ $result->status }}</td>
                        <td>{{ $result->created_at }}</td>

                        <td>
                            <a href="{{ route('home') }}" class="btn btn-success">
                                <i class="fa-solid fa-house"></i>
                            </a>
                        </td>

                    </tr>
                </tbody>

            </table>

        </div>
    </div>
</div>

@endsection
