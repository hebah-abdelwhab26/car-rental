@extends('layouts.app')

@section('content')

<style>
.table-responsive{
    overflow-x:auto;
}

.table{
    min-width:1000px;
}

/* Action Buttons */
.action-buttons{
    display:flex;
    flex-wrap:wrap;
    gap:6px;
    align-items:center;
}

.action-buttons .btn{
    padding:.35rem .60rem;
    font-size:.82rem;
    white-space:nowrap;
}

.action-buttons form{
    margin:0;
}

.action-buttons form .btn{
    width:100%;
}

/* Large Screens */
@media (min-width:1200px){

    .action-buttons{
        flex-wrap:nowrap;
    }

}

/* Laptop & Tablet */
@media (max-width:1199px){

    .action-buttons{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:5px;
        min-width:220px;
    }

    .action-buttons .btn{
        width:100%;
        font-size:.72rem;
        padding:.30rem .45rem;
    }

}

/* Mobile */
@media (max-width:768px){

    .card-header{
        flex-direction:column;
        align-items:flex-start!important;
        gap:10px;
    }

    .action-buttons{
        display:flex;
        flex-direction:column;
    }

    .action-buttons .btn,
    .action-buttons form{
        width:100%;
    }

    .action-buttons .btn{
        font-size:.80rem;
    }

}
</style>

<div class="container">

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3 class="mb-0">{{ __('messages.users_management') }}</h3>

            <span class="badge bg-primary">
                {{ __('messages.total_users') }} :
                {{ $users->count() }}
            </span>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle">

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

                                <div class="action-buttons">

                                    <a href="{{ route('users.show',$user->id) }}"
                                       class="btn btn-info btn-sm">
                                        {{ __('messages.view') }}
                                    </a>

                                    <a href="{{ route('users.edit',$user->id) }}"
                                       class="btn btn-warning btn-sm">
                                        {{ __('messages.edit') }}
                                    </a>

                                    @if($user->role=='user')

                                        <a href="{{ route('users.makeAdmin',$user->id) }}"
                                           class="btn btn-dark btn-sm">
                                            {{ __('messages.make_admin') }}
                                        </a>

                                    @endif

                                    @if($user->status=='1')

                                        <a href="{{ route('users.disable',$user->id) }}"
                                           class="btn btn-secondary btn-sm">
                                            {{ __('messages.disable') }}
                                        </a>

                                    @else

                                        <a href="{{ route('users.activate',$user->id) }}"
                                           class="btn btn-success btn-sm">
                                            {{ __('messages.activate') }}
                                        </a>

                                    @endif

                                    <form action="{{ route('users.destroy',$user->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('{{ __('messages.confirm_delete_user') }}')">

                                            {{ __('messages.delete') }}

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>
                                            @empty

                        <tr>

                            <td colspan="8" class="text-center py-4">

                                {{ __('messages.no_users_found') }}

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
