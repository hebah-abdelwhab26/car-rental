@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- PAGE HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1 fw-bold">{{ __('messages.orders_management') }}</h2>
            <p class="text-muted mb-0">
                {{ __('messages.manage_bookings_track_statuses_and_review_revenue') }}
            </p>
        </div>

        <div class="mt-2 mt-md-0">
            <span class="badge bg-primary fs-6 px-3 py-2">
                {{ __('messages.total_orders') }}: {{ $orders->count() }}
            </span>
        </div>
    </div>

    {{-- ALERTS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- FILTER --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white border-0 pb-0">
            <h5 class="mb-0">{{ __('messages.filter') }} & {{ __('messages.export_excel') }}</h5>
        </div>

        <div class="card-body">
            <form method="GET" action="{{ route('orders.filter') }}">
                <div class="row g-3 align-items-end">

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">
                            {{ __('messages.from_date') }}
                        </label>
                        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">
                            {{ __('messages.to_date') }}
                        </label>
                        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-primary">
                                {{ __('messages.filter') }}
                            </button>

                            <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                                {{ __('messages.reset') }}
                            </a>

                            <a href="{{ route('orders.export.pdf') }}" class="btn btn-danger">
                                {{ __('messages.export_pdf') }}
                            </a>

                            <a href="{{ route('orders.export.excel') }}" class="btn btn-success">
                                {{ __('messages.export_excel') }}
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white border-0">
            <h5 class="mb-0">{{ __('messages.orders') }}</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle text-center">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.user') }}</th>
                            <th>{{ __('messages.car') }}</th>
                            <th>{{ __('messages.start_date') }}</th>
                            <th>{{ __('messages.end_date') }}</th>
                            <th>{{ __('messages.total_price') }}</th>
                            <th>{{ __('messages.payment_method') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($orders as $order)

                            <tr>

                                <td>{{ $order->id }}</td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $order->user->name ?? __('messages.no_data') }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $order->user->email ?? '' }}
                                    </small>
                                </td>

                                <td>
                                    {{ $order->product->name ?? __('messages.no_data') }}
                                </td>

                                <td>{{ $order->start_date }}</td>

                                <td>{{ $order->end_date }}</td>

                                <td class="fw-bold text-success">
                                    ${{ number_format($order->total_price, 2) }}
                                </td>

                                <td>
                                    {{ $order->payment_method ?? __('messages.no_data') }}
                                </td>

                                <td>

                                    @switch($order->status)

                                        @case('pending')
                                            <span class="badge bg-warning text-dark">
                                                {{ __('messages.pending') }}
                                            </span>
                                            @break

                                        @case('confirmed')
                                            <span class="badge bg-primary">
                                                {{ __('messages.confirmed') }}
                                            </span>
                                            @break

                                        @case('completed')
                                            <span class="badge bg-success">
                                                {{ __('messages.completed') }}
                                            </span>
                                            @break

                                        @case('cancelled')
                                            <span class="badge bg-danger">
                                                {{ __('messages.cancelled') }}
                                            </span>
                                            @break

                                        @default
                                            <span class="badge bg-secondary">
                                                {{ ucfirst($order->status) }}
                                            </span>

                                    @endswitch

                                </td>

                                <td>

                                    <a href="{{ route('orders.show', $order->id) }}"
                                       class="btn btn-sm btn-outline-dark mb-2">
                                        {{ __('messages.view') }}
                                    </a>

                                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                        @csrf

                                        <div class="input-group input-group-sm">

                                            <select name="status" class="form-select">

                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                    {{ __('messages.pending') }}
                                                </option>

                                                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>
                                                    {{ __('messages.confirmed') }}
                                                </option>

                                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                                    {{ __('messages.completed') }}
                                                </option>

                                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                                    {{ __('messages.cancelled') }}
                                                </option>

                                            </select>

                                            <button class="btn btn-primary">
                                                {{ __('messages.save') }}
                                            </button>

                                        </div>
                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="9" class="text-muted py-4">
                                    {{ __('messages.no_orders_found') }}
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>
    </div>

    {{-- CHARTS --}}
    <div class="row g-4">

        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-0">
                    <h5>{{ __('messages.monthly_orders') }}</h5>
                </div>

                <div class="card-body" style="height: 350px;">
                    <canvas id="ordersChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-0">
                    <h5>{{ __('messages.monthly_revenue') }}</h5>
                </div>

                <div class="card-body" style="height: 350px;">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const monthlyOrdersRaw = @json($monthlyOrders);
    const monthlyRevenueRaw = @json($monthlyRevenue);

    const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    const ordersData = new Array(12).fill(0);
    const revenueData = new Array(12).fill(0);

    monthlyOrdersRaw.forEach(item => {
        const monthIndex = parseInt(item.month) - 1;
        if (monthIndex >= 0 && monthIndex < 12) {
            ordersData[monthIndex] = parseInt(item.total);
        }
    });

    monthlyRevenueRaw.forEach(item => {
        const monthIndex = parseInt(item.month) - 1;
        if (monthIndex >= 0 && monthIndex < 12) {
            revenueData[monthIndex] = parseFloat(item.total);
        }
    });

    const ordersCanvas = document.getElementById('ordersChart');
    if (ordersCanvas) {
        new Chart(ordersCanvas, {
            type: 'bar',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: '{{ __("messages.monthly_orders") }}',
                    data: ordersData,
                    backgroundColor: 'rgba(13, 110, 253, 0.7)',
                    borderColor: 'rgba(13, 110, 253, 1)',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    }

    const revenueCanvas = document.getElementById('revenueChart');
    if (revenueCanvas) {
        new Chart(revenueCanvas, {
            type: 'line',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: '{{ __("messages.monthly_revenue") }}',
                    data: revenueData,
                    fill: true,
                    tension: 0.35,
                    backgroundColor: 'rgba(25, 135, 84, 0.15)',
                    borderColor: 'rgba(25, 135, 84, 1)',
                    borderWidth: 3,
                    pointBackgroundColor: 'rgba(25, 135, 84, 1)',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

});
</script>
@endpush
