@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            <h3>{{ __('messages.user_details') }}</h3>
        </div>


        <div class="card-body">


            <table class="table table-bordered">


                <tr>
                    <th>{{ __('messages.id') }}</th>
                    <td>{{ $user->id }}</td>
                </tr>


                <tr>
                    <th>{{ __('messages.name') }}</th>
                    <td>{{ $user->name }}</td>
                </tr>


                <tr>
                    <th>{{ __('messages.email') }}</th>
                    <td>{{ $user->email }}</td>
                </tr>


                <tr>
                    <th>{{ __('messages.phone') }}</th>
                    <td>{{ $user->phone ?? '-' }}</td>
                </tr>


                <tr>
                    <th>{{ __('messages.role') }}</th>
                    <td>{{ $user->role }}</td>
                </tr>


                <tr>
                    <th>{{ __('messages.status') }}</th>
                    <td>

                        @if($user->status == '1')

                            {{ __('messages.active') }}

                        @else

                            {{ __('messages.inactive') }}

                        @endif

                    </td>
                </tr>


                <tr>
                    <th>{{ __('messages.created_at') }}</th>
                    <td>{{ $user->created_at }}</td>
                </tr>


            </table>



            <a href="{{ route('users.index') }}"
               class="btn btn-secondary">

                {{ __('messages.back') }}

            </a>


        </div>


    </div>


</div>


@endsection
