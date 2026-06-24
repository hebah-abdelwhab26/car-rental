@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-sm">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('messages.my_profile') }}</h5>
                </div>

                <div class="card-body">

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('messages.name') }}
                        </label>

                        <input type="text"
                               class="form-control"
                               value="{{ auth()->user()->name }}"
                               disabled>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('messages.email') }}
                        </label>

                        <input type="text"
                               class="form-control"
                               value="{{ auth()->user()->email }}"
                               disabled>
                    </div>


                    <hr>


                    <form method="POST" action="{{ route('profile.update') }}">

                        @csrf
                        @method('PATCH')


                        <div class="mb-3">
                            <label class="form-label">
                                {{ __('messages.update_name') }}
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ auth()->user()->name }}">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">
                                {{ __('messages.update_email') }}
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ auth()->user()->email }}">
                        </div>


                        <button type="submit" class="btn btn-success w-100">
                            {{ __('messages.save_changes') }}
                        </button>


                    </form>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection
