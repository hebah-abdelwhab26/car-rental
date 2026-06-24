@extends('layouts.app')

@section('content')

<style>
    .dash-card {
        border: 0;
        border-radius: 16px;
        transition: 0.3s;
        overflow: hidden;
        background: #fff;
    }

    .dash-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.12);
    }

    .icon-box {
        width: 55px;
        height: 55px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: #fff;
    }

    .bg-users { background: linear-gradient(135deg, #6366f1, #4f46e5); }
    .bg-cars { background: linear-gradient(135deg, #10b981, #059669); }
    .bg-categories { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .bg-locations { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .bg-orders { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .bg-payments { background: linear-gradient(135deg, #111827, #374151); }
    .bg-comments { background: linear-gradient(135deg, #ec4899, #db2777); }

    .stat-number {
        font-size: 24px;
        font-weight: bold;
        color: #111827;
    }

    .stat-label {
        color: #6b7280;
        font-size: 13px;
    }

    a.dashboard-link {
        text-decoration: none;
        color: inherit;
    }

    .section-title {
        font-weight: 700;
        margin-top: 40px;
        margin-bottom: 15px;
    }

    .table thead th {
        white-space: nowrap;
        font-size: 14px;
    }

    .table td {
        vertical-align: middle;
    }

    .mini-muted {
        color: #6b7280;
        font-size: 13px;
    }

    .empty-box {
        padding: 25px;
        text-align: center;
        color: #6b7280;
    }
</style>


<div class="container py-4">


    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold">
            {{ __('messages.dashboard') }}
        </h2>

        <p class="text-muted">
            {{ __('messages.overview_car_rental_system') }}
        </p>

    </div>


    {{-- STATS CARDS --}}
    <div class="row g-4">


        {{-- USERS --}}
        <div class="col-md-4 col-lg-3">

            <a href="{{ route('users.index') }}" class="dashboard-link">

                <div class="card dash-card shadow-sm p-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box bg-users">
                            👤
                        </div>

                        <div>

                            <div class="stat-number">
                                {{ $users }}
                            </div>

                            <div class="stat-label">
                                {{ __('messages.users') }}
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>



        {{-- CARS --}}
        <div class="col-md-4 col-lg-3">

            <a href="{{ route('products.index') }}" class="dashboard-link">

                <div class="card dash-card shadow-sm p-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box bg-cars">
                            🚗
                        </div>

                        <div>

                            <div class="stat-number">
                                {{ $products }}
                            </div>

                            <div class="stat-label">
                                {{ __('messages.cars') }}
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>



        {{-- CATEGORIES --}}
        <div class="col-md-4 col-lg-3">

            <a href="{{ route('categories.index') }}" class="dashboard-link">

                <div class="card dash-card shadow-sm p-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box bg-categories">
                            📂
                        </div>

                        <div>

                            <div class="stat-number">
                                {{ $categories }}
                            </div>

                            <div class="stat-label">
                                {{ __('messages.categories') }}
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

                {{-- LOCATIONS --}}
        <div class="col-md-4 col-lg-3">

            <a href="{{ route('locations.index') }}" class="dashboard-link">

                <div class="card dash-card shadow-sm p-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box bg-locations">
                            📍
                        </div>

                        <div>

                            <div class="stat-number">
                                {{ $locations }}
                            </div>

                            <div class="stat-label">
                                {{ __('messages.locations') }}
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>



        {{-- ORDERS --}}
        <div class="col-md-4 col-lg-3">

            <a href="{{ route('orders.index') }}" class="dashboard-link">

                <div class="card dash-card shadow-sm p-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box bg-orders">
                            📦
                        </div>

                        <div>

                            <div class="stat-number">
                                {{ $orders }}
                            </div>

                            <div class="stat-label">
                                {{ __('messages.orders') }}
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>



        {{-- PAYMENTS --}}
        <div class="col-md-4 col-lg-3">

            <a href="{{ route('payments.index') }}" class="dashboard-link">

                <div class="card dash-card shadow-sm p-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box bg-payments">
                            💳
                        </div>

                        <div>

                            <div class="stat-number">
                                {{ $payments }}
                            </div>

                            <div class="stat-label">
                                {{ __('messages.payments') }}
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>



        {{-- COMMENTS --}}
        <div class="col-md-4 col-lg-3">

            <a href="{{ route('comments.index') }}" class="dashboard-link">

                <div class="card dash-card shadow-sm p-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box bg-comments">
                            💬
                        </div>

                        <div>

                            <div class="stat-number">
                                {{ $commentsCount }}
                            </div>

                            <div class="stat-label">
                                {{ __('messages.comments') }}
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>


    </div>



    {{-- LATEST ORDERS --}}
    <h4 class="section-title">
        {{ __('messages.latest_orders') }}
    </h4>


    <div class="card shadow-sm border-0">

        <div class="card-body table-responsive">


            @if(isset($latestOrders) && $latestOrders->count())


                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>{{ __('messages.id') }}</th>
                            <th>{{ __('messages.user') }}</th>
                            <th>{{ __('messages.car') }}</th>
                            <th>{{ __('messages.total') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.payment') }}</th>
                            <th>{{ __('messages.date') }}</th>

                        </tr>

                    </thead>



                    <tbody>

                        @foreach($latestOrders as $order)

                            <tr>


                                <td>
                                    #{{ $order->id }}
                                </td>



                                <td>

                                    <div class="fw-semibold">
                                        {{ $order->user->name ?? '-' }}
                                    </div>

                                    <div class="mini-muted">
                                        {{ $order->user->email ?? '' }}
                                    </div>

                                </td>



                                <td>
                                    {{ $order->product->name ?? '-' }}
                                </td>



                                <td>
                                    ${{ number_format($order->total_price,2) }}
                                </td>



                                <td>

                                    @if($order->status == 'pending')

                                        <span class="badge bg-warning text-dark">
                                            {{ __('messages.pending') }}
                                        </span>

                                    @elseif($order->status == 'confirmed')

                                        <span class="badge bg-primary">
                                            {{ __('messages.confirmed') }}
                                        </span>

                                    @elseif($order->status == 'completed')

                                        <span class="badge bg-success">
                                            {{ __('messages.completed') }}
                                        </span>

                                    @elseif($order->status == 'cancelled')

                                        <span class="badge bg-danger">
                                            {{ __('messages.cancelled') }}
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ ucfirst($order->status) }}
                                        </span>

                                    @endif

                                </td>
                                                                <td>

                                    @if(optional($order->payment)->payment_status == 'paid')

                                        <span class="badge bg-success">
                                            {{ __('messages.paid') }}
                                        </span>

                                    @elseif(optional($order->payment)->payment_status == 'failed')

                                        <span class="badge bg-danger">
                                            {{ __('messages.failed') }}
                                        </span>

                                    @elseif(optional($order->payment)->payment_status == 'pending')

                                        <span class="badge bg-warning text-dark">
                                            {{ __('messages.pending') }}
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ __('messages.no_payment') }}
                                        </span>

                                    @endif

                                </td>



                                <td>
                                    {{ $order->created_at->format('Y-m-d') }}
                                </td>


                            </tr>

                        @endforeach


                    </tbody>


                </table>


            @else


                <div class="empty-box">

                    {{ __('messages.no_recent_orders_found') }}

                </div>


            @endif


        </div>

    </div>




    {{-- LATEST PAYMENTS --}}
    <h4 class="section-title">
        {{ __('messages.latest_payments') }}
    </h4>



    <div class="card shadow-sm border-0">


        <div class="card-body table-responsive">



            @if(isset($latestPayments) && $latestPayments->count())


                <table class="table align-middle">


                    <thead>

                        <tr>

                            <th>{{ __('messages.payment_id') }}</th>
                            <th>{{ __('messages.order') }}</th>
                            <th>{{ __('messages.customer') }}</th>
                            <th>{{ __('messages.method') }}</th>
                            <th>{{ __('messages.amount') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.paid_at') }}</th>

                        </tr>


                    </thead>



                    <tbody>


                        @foreach($latestPayments as $payment)


                            <tr>


                                <td>
                                    #{{ $payment->id }}
                                </td>



                                <td>


                                    @if($payment->order)

                                        <a href="{{ route('orders.show', $payment->order->id) }}"
                                           class="text-decoration-none fw-semibold">

                                            {{ __('messages.order') }} #{{ $payment->order->id }}

                                        </a>


                                    @else

                                        -

                                    @endif


                                </td>



                                <td>

                                    {{ $payment->order->user->name ?? '-' }}

                                </td>



                                <td>

                                    {{ ucfirst($payment->payment_method) }}

                                </td>



                                <td>

                                    ${{ number_format($payment->amount,2) }}

                                </td>



                                <td>


                                    @if($payment->payment_status == 'paid')


                                        <span class="badge bg-success">

                                            {{ __('messages.paid') }}

                                        </span>



                                    @elseif($payment->payment_status == 'failed')


                                        <span class="badge bg-danger">

                                            {{ __('messages.failed') }}

                                        </span>



                                    @elseif($payment->payment_status == 'pending')


                                        <span class="badge bg-warning text-dark">

                                            {{ __('messages.pending') }}

                                        </span>



                                    @else


                                        <span class="badge bg-secondary">

                                            {{ ucfirst($payment->payment_status) }}

                                        </span>


                                    @endif


                                </td>



                                <td>


                                    {{ $payment->paid_at
                                        ? $payment->paid_at->format('Y-m-d H:i')
                                        : '-'
                                    }}


                                </td>


                            </tr>


                        @endforeach


                    </tbody>


                </table>



            @else


                <div class="empty-box">

                    {{ __('messages.no_recent_payments_found') }}

                </div>



            @endif



        </div>


    </div>



</div>


@endsection
