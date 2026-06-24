@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">{{ __('messages.comments') }} {{ __('messages.management') ?? 'Management' }}</h3>

            <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">
                {{ __('messages.back') }} {{ __('messages.dashboard') }}
            </a>
        </div>

        <div class="card-body">

            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <!-- STATS -->
            <div class="row g-4 mb-4">

                <div class="col-md-6">
                    <div class="card bg-danger text-white shadow p-3">
                        <h5>{{ __('messages.total_comments') ?? 'Total Comments' }}</h5>
                        <h2>{{ $commentsCount ?? 0 }}</h2>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card bg-warning text-dark shadow p-3">
                        <h5>{{ __('messages.average_rating') ?? 'Average Rating' }}</h5>
                        <h2>{{ number_format($avgRating ?? 0, 1) }} ⭐</h2>
                    </div>
                </div>

            </div>

            <!-- COMMENTS TABLE -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.user') }}</th>
                            <th>{{ __('messages.car') }}</th>
                            <th>{{ __('messages.rating') }}</th>
                            <th>{{ __('messages.comment') }}</th>
                            <th>{{ __('messages.date') }}</th>
                            <th width="120">{{ __('messages.action') ?? __('messages.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->user->name ?? __('messages.na') }}</td>
                                <td>{{ $comment->product->name ?? __('messages.na') }}</td>

                                <td>
                                    @for($i = 1; $i <= 5; $i++)
                                        <span style="color: {{ $i <= $comment->rating ? 'gold' : '#ccc' }}; font-size:18px;">
                                            ★
                                        </span>
                                    @endfor
                                    <div>
                                        <small>{{ $comment->rating }}/5</small>
                                    </div>
                                </td>

                                <td>{{ $comment->comment }}</td>

                                <td>{{ $comment->created_at ? $comment->created_at->format('Y-m-d') : '-' }}</td>

                                <td>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('{{ __('messages.confirm_delete_comment') ?? 'Are you sure you want to delete this comment?' }}')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">
                                            {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('messages.no_comments_found') ?? 'No Comments Found' }}</td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

            <!-- PAGINATION -->
            <div class="mt-3">
                {{ $comments->links() }}
            </div>

        </div>

    </div>

</div>

@endsection
