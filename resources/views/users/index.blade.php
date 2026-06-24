@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3>{{ __('messages.users_management') }}</h3>

            <span class="badge bg-primary">
                {{ __('messages.total_users') }} : {{ $users->count() }}
            </span>

        </div>


        <div class="card-body">


            <table class="table table-bordered table-striped">


                <thead>

                    <tr>
                        <th>{{ __('messages.id') }}</th>
                        <th>{{ __('messages.name') }}</th>
                        <th>{{ __('messages.email') }}</th>
                        <th>{{ __('messages.phone') }}</th>
                        <th>{{ __('messages.role') }}</th>
                        <th>{{ __('messages.status') }}</th>
                        <th>{{ __('messages.created') }}</th>
                        <th width="320">{{ __('messages.actions') }}</th>
                    </tr>

                </thead>


                <tbody>


                    @forelse($users as $user)


                        <tr>


                            <td>{{ $user->id }}</td>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->email }}</td>

                            <td>{{ $user->phone }}</td>



                            <td>

                                @if($user->role == 'admin')

                                    <span class="badge bg-danger">
                                        {{ __('messages.admin') }}
                                    </span>

                                @else

                                    <span class="badge bg-primary">
                                        {{ __('messages.user') }}
                                    </span>

                                @endif

                            </td>



                            <td>

                                @if($user->status == '1')

                                    <span class="badge bg-success">
                                        {{ __('messages.active') }}
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        {{ __('messages.inactive') }}
                                    </span>

                                @endif

                            </td>



                            <td>
                                {{ $user->created_at->format('Y-m-d') }}
                            </td>



                            <td>


                                <a href="{{ route('users.show', $user->id) }}"
                                   class="btn btn-info btn-sm">
                                    {{ __('messages.view') }}
                                </a>



                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="btn btn-warning btn-sm">
                                    {{ __('messages.edit') }}
                                </a>



                                @if($user->role == 'user')

                                    <a href="{{ route('users.makeAdmin', $user->id) }}"
                                       class="btn btn-dark btn-sm">
                                        {{ __('messages.make_admin') }}
                                    </a>

                                @endif




                                @if($user->status == '1')

                                    <a href="{{ route('users.disable', $user->id) }}"
                                       class="btn btn-secondary btn-sm">
                                        {{ __('messages.disable') }}
                                    </a>

                                @else

                                    <a href="{{ route('users.activate', $user->id) }}"
                                       class="btn btn-success btn-sm">
                                        {{ __('messages.activate') }}
                                    </a>

                                @endif




                                <form action="{{ route('users.destroy', $user->id) }}"
                                      method="POST"
                                      style="display:inline">

                                    @csrf
                                    @method('DELETE')


                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('{{ __('messages.confirm_delete_user') }}')">

                                        {{ __('messages.delete') }}

                                    </button>


                                </form>


                            </td>


                        </tr>



                    @empty


                        <tr>

                            <td colspan="8" class="text-center">

                                {{ __('messages.no_users_found') }}

                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


@endsection
