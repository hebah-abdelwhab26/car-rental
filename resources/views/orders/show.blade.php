@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- PAGE HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1 fw-bold">
                {{ __('messages.order_details') }} #{{ $order->id }}
            </h2>

            <p class="text-muted mb-0">
                {{ __('messages.review_booking_details_payment_status') }}
            </p>
        </div>


        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">

            <i class="fa fa-arrow-left me-1"></i>

            {{ __('messages.back_to_orders') }}

        </a>

    </div>



    {{-- ALERTS --}}

    @if(session('success'))

        <div class="alert alert-success shadow-sm">

            {{ session('success') }}

        </div>

    @endif



    @if(session('error'))

        <div class="alert alert-danger shadow-sm">

            {{ session('error') }}

        </div>

    @endif




    <div class="row g-4">



        {{-- LEFT SIDE --}}

        <div class="col-lg-8">



            {{-- ORDER INFO --}}

            <div class="card border-0 shadow-sm mb-4">


                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">


                    <h5 class="mb-0">

                        {{ __('messages.order_information') }}

                    </h5>



                    @php

                        $statusClass = match($order->status) {

                            'pending'   => 'warning',

                            'confirmed' => 'primary',

                            'completed' => 'success',

                            'cancelled' => 'danger',

                            default     => 'secondary',

                        };

                    @endphp



                    <span class="badge bg-{{ $statusClass }} fs-6">

                        {{ __('messages.' . $order->status) }}

                    </span>


                </div>




                <div class="card-body">


                    <div class="row">



                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.customer_name') }}

                            </label>


                            <div class="fw-semibold">

                                {{ $order->user->name ?? 'N/A' }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.customer_email') }}

                            </label>


                            <div class="fw-semibold">

                                {{ $order->user->email ?? 'N/A' }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.car_name') }}

                            </label>


                            <div class="fw-semibold">

                                {{ $order->product->name ?? 'N/A' }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.brand') }}

                            </label>


                            <div class="fw-semibold">

                                {{ $order->product->brand ?? 'N/A' }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.model') }}

                            </label>


                            <div class="fw-semibold">

                                {{ $order->product->model ?? 'N/A' }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.year') }}

                            </label>


                            <div class="fw-semibold">

                                {{ $order->product->year ?? 'N/A' }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.start_date') }}

                            </label>


                            <div class="fw-semibold">

                                {{ \Carbon\Carbon::parse($order->start_date)->format('Y-m-d') }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.end_date') }}

                            </label>


                            <div class="fw-semibold">

                                {{ \Carbon\Carbon::parse($order->end_date)->format('Y-m-d') }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.payment_method') }}

                            </label>


                            <div class="fw-semibold">

                                {{ ucfirst($order->payment_method ?? '-') }}

                            </div>


                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="text-muted small">

                                {{ __('messages.created_at') }}

                            </label>


                            <div class="fw-semibold">

                                {{ $order->created_at?->format('Y-m-d h:i A') }}

                            </div>


                        </div>





                        <div class="col-md-12">


                            <label class="text-muted small">

                                {{ __('messages.total_price') }}

                            </label>


                            <div class="fs-4 fw-bold text-primary">

                                ${{ number_format($order->total_price,2) }}

                            </div>


                        </div>



                    </div>


                </div>


            </div>

                        {{-- PAYMENT INFO --}}

            <div class="card border-0 shadow-sm mb-4">


                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">


                    <h5 class="mb-0">

                        {{ __('messages.payment_information') }}

                    </h5>



                    @if($order->payment)

                        @php

                            $paymentStatusClass = match($order->payment->payment_status) {

                                'pending' => 'warning',

                                'paid'    => 'success',

                                'failed'  => 'danger',

                                default   => 'secondary',

                            };

                        @endphp



                        <span class="badge bg-{{ $paymentStatusClass }} fs-6">

                            {{ __('messages.' . $order->payment->payment_status) }}

                        </span>


                    @endif


                </div>




                <div class="card-body">


                    @if($order->payment)


                        <div class="row">


                            <div class="col-md-6 mb-3">

                                <label class="text-muted small">

                                    {{ __('messages.payment_method') }}

                                </label>


                                <div class="fw-semibold">

                                    {{ ucfirst($order->payment->payment_method) }}

                                </div>

                            </div>





                            <div class="col-md-6 mb-3">

                                <label class="text-muted small">

                                    {{ __('messages.amount') }}

                                </label>


                                <div class="fw-semibold text-primary">

                                    ${{ number_format($order->payment->amount,2) }}

                                </div>

                            </div>





                            <div class="col-md-6 mb-3">

                                <label class="text-muted small">

                                    {{ __('messages.payment_status') }}

                                </label>


                                <div class="fw-semibold">

                                    {{ __('messages.' . $order->payment->payment_status) }}

                                </div>

                            </div>





                            <div class="col-md-6 mb-3">

                                <label class="text-muted small">

                                    {{ __('messages.transaction_id') }}

                                </label>


                                <div class="fw-semibold">

                                    {{ $order->payment->transaction_id ?: 'N/A' }}

                                </div>

                            </div>





                            <div class="col-md-6 mb-3">

                                <label class="text-muted small">

                                    {{ __('messages.paid_at') }}

                                </label>


                                <div class="fw-semibold">


                                    {{
                                        $order->payment->paid_at
                                        ? $order->payment->paid_at->format('Y-m-d h:i A')
                                        : __('messages.not_paid_yet')
                                    }}


                                </div>

                            </div>





                            <div class="col-md-6 mb-3">

                                <label class="text-muted small">

                                    {{ __('messages.payment_record_created') }}

                                </label>


                                <div class="fw-semibold">

                                    {{ $order->payment->created_at?->format('Y-m-d h:i A') }}

                                </div>

                            </div>


                        </div>



                        <hr>




                        <div class="d-flex flex-wrap gap-2">


                            <a href="{{ route('payments.show',$order->payment->id) }}"
                               class="btn btn-outline-primary">


                                <i class="fa fa-credit-card me-1"></i>

                                {{ __('messages.view_payment_details') }}


                            </a>




                            <a href="{{ route('payments.index') }}"
                               class="btn btn-outline-dark">


                                <i class="fa fa-list me-1"></i>

                                {{ __('messages.all_payments') }}


                            </a>


                        </div>



                    @else


                        <div class="alert alert-warning mb-0">

                            {{ __('messages.no_payment_record') }}

                        </div>


                    @endif


                </div>


            </div>



        </div>





        {{-- RIGHT SIDE --}}

        <div class="col-lg-4">



            {{-- QUICK STATUS UPDATE --}}

            <div class="card border-0 shadow-sm mb-4">


                <div class="card-header bg-success text-white">


                    <h5 class="mb-0">

                        {{ __('messages.update_order_status') }}

                    </h5>


                </div>



                <div class="card-body">


                    <form action="{{ route('orders.updateStatus',$order->id) }}"
                          method="POST">

                        @csrf



                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                {{ __('messages.current_status') }}

                            </label>




                            <select name="status" class="form-select">


                                <option value="pending"
                                    {{ $order->status == 'pending' ? 'selected':'' }}>

                                    {{ __('messages.pending') }}

                                </option>



                                <option value="confirmed"
                                    {{ $order->status == 'confirmed' ? 'selected':'' }}>

                                    {{ __('messages.confirmed') }}

                                </option>



                                <option value="completed"
                                    {{ $order->status == 'completed' ? 'selected':'' }}>

                                    {{ __('messages.completed') }}

                                </option>



                                <option value="cancelled"
                                    {{ $order->status == 'cancelled' ? 'selected':'' }}>

                                    {{ __('messages.cancelled') }}

                                </option>


                            </select>


                        </div>




                        <button type="submit"
                                class="btn btn-success w-100">


                            {{ __('messages.update_order_status') }}


                        </button>


                    </form>


                </div>


            </div>
                        {{-- QUICK PAYMENT UPDATE --}}

            @if($order->payment)

                <div class="card border-0 shadow-sm mb-4">


                    <div class="card-header bg-warning text-dark">

                        <h5 class="mb-0">

                            {{ __('messages.update_payment_status') }}

                        </h5>

                    </div>




                    <div class="card-body">


                        <form action="{{ route('payments.updateStatus',$order->payment->id) }}"
                              method="POST">


                            @csrf



                            <div class="mb-3">


                                <label class="form-label fw-semibold">

                                    {{ __('messages.payment_status') }}

                                </label>



                                <select name="payment_status"
                                        class="form-select">



                                    <option value="pending"
                                        {{ $order->payment->payment_status == 'pending' ? 'selected':'' }}>

                                        {{ __('messages.pending') }}

                                    </option>




                                    <option value="paid"
                                        {{ $order->payment->payment_status == 'paid' ? 'selected':'' }}>

                                        {{ __('messages.paid') }}

                                    </option>




                                    <option value="failed"
                                        {{ $order->payment->payment_status == 'failed' ? 'selected':'' }}>

                                        {{ __('messages.failed') }}

                                    </option>



                                </select>


                            </div>




                            <button type="submit"
                                    class="btn btn-warning w-100">


                                {{ __('messages.update_payment_status') }}


                            </button>



                        </form>


                    </div>


                </div>


            @endif







            {{-- SUMMARY BOX --}}


            <div class="card border-0 shadow-sm">


                <div class="card-header bg-light">


                    <h5 class="mb-0">

                        {{ __('messages.summary') }}

                    </h5>


                </div>




                <div class="card-body">



                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">

                            {{ __('messages.order_id') }}

                        </span>


                        <strong>

                            #{{ $order->id }}

                        </strong>


                    </div>





                    <div class="d-flex justify-content-between mb-2">


                        <span class="text-muted">

                            {{ __('messages.customer') }}

                        </span>


                        <strong>

                            {{ $order->user->name ?? 'N/A' }}

                        </strong>


                    </div>





                    <div class="d-flex justify-content-between mb-2">


                        <span class="text-muted">

                            {{ __('messages.car') }}

                        </span>


                        <strong>

                            {{ $order->product->name ?? 'N/A' }}

                        </strong>


                    </div>





                    <div class="d-flex justify-content-between mb-2">


                        <span class="text-muted">

                            {{ __('messages.order_status') }}

                        </span>


                        <strong>

                            {{ __('messages.' . $order->status) }}

                        </strong>


                    </div>





                    @if($order->payment)


                        <div class="d-flex justify-content-between mb-2">


                            <span class="text-muted">

                                {{ __('messages.payment_status') }}

                            </span>


                            <strong>

                                {{ __('messages.' . $order->payment->payment_status) }}

                            </strong>


                        </div>


                    @endif




                    <hr>




                    <div class="d-flex justify-content-between">


                        <span class="fw-semibold">

                            {{ __('messages.total') }}

                        </span>


                        <span class="fw-bold text-primary">


                            ${{ number_format($order->total_price,2) }}


                        </span>


                    </div>



                </div>


            </div>



        </div>


    </div>


</div>


@endsection
