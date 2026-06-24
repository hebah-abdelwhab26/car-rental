@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            <h3>{{ __('messages.edit_user') }}</h3>
        </div>


        <div class="card-body">


            <form action="{{ route('users.update', $user->id) }}"
                  method="POST">

                @csrf

                <input type="hidden" name="_method" value="PUT">


                <div class="mb-3">

                    <label>
                        {{ __('messages.name') }}
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $user->name }}">

                </div>



                <div class="mb-3">

                    <label>
                        {{ __('messages.email') }}
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ $user->email }}">

                </div>



                <div class="mb-3">

                    <label>
                        {{ __('messages.phone') }}
                    </label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ $user->phone }}">

                </div>



                <div class="mb-3">

                    <label>
                        {{ __('messages.role') }}
                    </label>


                    <select name="role" class="form-control">


                        <option value="user"
                            {{ $user->role == 'user' ? 'selected' : '' }}>

                            {{ __('messages.user') }}

                        </option>


                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>

                            {{ __('messages.admin') }}

                        </option>


                    </select>


                </div>




                <div class="mb-3">


                    <label>
                        {{ __('messages.status') }}
                    </label>


                    <select name="status" class="form-control">


                        <option value="1"
                            {{ $user->status == '1' ? 'selected' : '' }}>

                            {{ __('messages.active') }}

                        </option>



                        <option value="0"
                            {{ $user->status == '0' ? 'selected' : '' }}>

                            {{ __('messages.inactive') }}

                        </option>


                    </select>


                </div>




                <button type="submit"
                        class="btn btn-primary">

                    {{ __('messages.update_user') }}

                </button>



            </form>


        </div>


    </div>


</div>


@endsection
