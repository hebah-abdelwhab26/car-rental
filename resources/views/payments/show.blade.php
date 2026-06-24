@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- PAGE HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">
                {{ __('messages.payment_details') }} #{{ $payment->id }}
            </h2>

            <p class="text-muted mb-0">
                {{ __('messages.full_payment_information') }}
            </p>
        </div>


        <div class="d-flex gap-2">

            <a href="{{ route('payments.index') }}"
               class="btn btn-outline-secondary">

                {{ __('messages.back_to_payments') }}

            </a>


            @if($payment->order)

                <a href="{{ route('orders.show', $payment->order->id) }}"
                   class="btn btn-primary">

                    {{ __('messages.view_order') }}

                </a>

            @endif

        </div>

    </div>


    <div class="row g-4">


        {{-- LEFT SIDE --}}
        <div class="col-lg-8">


            {{-- PAYMENT INFO --}}
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        {{ __('messages.payment_information') }}
                    </h5>

                </div>


                <div class="card-body">

                    <div class="row">


                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.payment_id') }}
                            </small>

                            <strong>
                                #{{ $payment->id }}
                            </strong>

                        </div>



                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.order_id') }}
                            </small>

                            <strong>
                                #{{ $payment->order_id }}
                            </strong>

                        </div>



                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.payment_method') }}
                            </small>

                            <strong>
                                {{ ucfirst($payment->payment_method) }}
                            </strong>

                        </div>



                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.amount') }}
                            </small>

                            <strong class="text-success">
                                ${{ number_format($payment->amount, 2) }}
                            </strong>

                        </div>



                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.payment_status') }}
                            </small>


                            @if($payment->payment_status == 'pending')

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    {{ __('messages.pending') }}
                                </span>


                            @elseif($payment->payment_status == 'paid')

                                <span class="badge bg-success px-3 py-2">
                                    {{ __('messages.paid') }}
                                </span>


                            @elseif($payment->payment_status == 'failed')

                                <span class="badge bg-danger px-3 py-2">
                                    {{ __('messages.failed') }}
                                </span>


                            @else

                                <span class="badge bg-secondary px-3 py-2">
                                    {{ ucfirst($payment->payment_status) }}
                                </span>


                            @endif

                        </div>



                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.transaction_id') }}
                            </small>

                            <strong>
                                {{ $payment->transaction_id ?: '—' }}
                            </strong>

                        </div>



                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.paid_at') }}
                            </small>

                            <strong>

                                {{ $payment->paid_at
                                    ? $payment->paid_at->format('d M Y - h:i A')
                                    : __('messages.not_paid_yet')
                                }}

                            </strong>

                        </div>



                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.created_at') }}
                            </small>

                            <strong>
                                {{ $payment->created_at->format('d M Y - h:i A') }}
                            </strong>

                        </div>



                        <div class="col-md-6 mb-3">

                            <small class="text-muted d-block">
                                {{ __('messages.last_update') }}
                            </small>

                            <strong>
                                {{ $payment->updated_at->format('d M Y - h:i A') }}
                            </strong>

                        </div>


                    </div>

                </div>

            </div>
                        {{-- ORDER INFO --}}
            @if($payment->order)

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">
                            {{ __('messages.reservation_information') }}
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="row">


                            <div class="col-md-6 mb-3">

                                <small class="text-muted d-block">
                                    {{ __('messages.order_status') }}
                                </small>


                                @if($payment->order->status == 'pending')

                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        {{ __('messages.pending') }}
                                    </span>


                                @elseif($payment->order->status == 'confirmed')

                                    <span class="badge bg-primary px-3 py-2">
                                        {{ __('messages.confirmed') }}
                                    </span>


                                @elseif($payment->order->status == 'completed')

                                    <span class="badge bg-success px-3 py-2">
                                        {{ __('messages.completed') }}
                                    </span>


                                @elseif($payment->order->status == 'cancelled')

                                    <span class="badge bg-danger px-3 py-2">
                                        {{ __('messages.cancelled') }}
                                    </span>


                                @else

                                    <span class="badge bg-secondary px-3 py-2">
                                        {{ ucfirst($payment->order->status) }}
                                    </span>

                                @endif

                            </div>



                            <div class="col-md-6 mb-3">

                                <small class="text-muted d-block">
                                    {{ __('messages.total_price') }}
                                </small>

                                <strong>
                                    ${{ number_format($payment->order->total_price, 2) }}
                                </strong>

                            </div>



                            <div class="col-md-6 mb-3">

                                <small class="text-muted d-block">
                                    {{ __('messages.start_date') }}
                                </small>

                                <strong>
                                    {{ \Carbon\Carbon::parse($payment->order->start_date)->format('d M Y') }}
                                </strong>

                            </div>



                            <div class="col-md-6 mb-3">

                                <small class="text-muted d-block">
                                    {{ __('messages.end_date') }}
                                </small>

                                <strong>
                                    {{ \Carbon\Carbon::parse($payment->order->end_date)->format('d M Y') }}
                                </strong>

                            </div>


                        </div>

                    </div>

                </div>

            @endif




            {{-- CUSTOMER INFO --}}
            @if($payment->order && $payment->order->user)

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">
                            {{ __('messages.customer_information') }}
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="row">


                            <div class="col-md-6 mb-3">

                                <small class="text-muted d-block">
                                    {{ __('messages.customer_name') }}
                                </small>

                                <strong>
                                    {{ $payment->order->user->name }}
                                </strong>

                            </div>



                            <div class="col-md-6 mb-3">

                                <small class="text-muted d-block">
                                    {{ __('messages.email_address') }}
                                </small>

                                <strong>
                                    {{ $payment->order->user->email }}
                                </strong>

                            </div>



                            @if(!empty($payment->order->user->phone))

                                <div class="col-md-6 mb-3">

                                    <small class="text-muted d-block">
                                        {{ __('messages.phone') }}
                                    </small>

                                    <strong>
                                        {{ $payment->order->user->phone }}
                                    </strong>

                                </div>

                            @endif


                        </div>

                    </div>

                </div>

            @endif




            {{-- CAR INFO --}}
            @if($payment->order && $payment->order->product)

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">
                            {{ __('messages.car_information') }}
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="row align-items-center">


                            <div class="col-md-4 mb-3">

                                @if($payment->order->product->image)

                                    <img src="{{ asset('img/product/' . $payment->order->product->image) }}"
                                         alt="{{ $payment->order->product->name }}"
                                         class="img-fluid rounded shadow-sm"
                                         style="width:100%; height:220px; object-fit:cover;">

                                @else

                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="height:220px;">

                                        <span class="text-muted">
                                            {{ __('messages.no_image') }}
                                        </span>

                                    </div>

                                @endif

                            </div>



                            <div class="col-md-8">

                                <div class="row">


                                    <div class="col-md-6 mb-3">

                                        <small class="text-muted d-block">
                                            {{ __('messages.car_name') }}
                                        </small>

                                        <strong>
                                            {{ $payment->order->product->name }}
                                        </strong>

                                    </div>



                                    <div class="col-md-6 mb-3">

                                        <small class="text-muted d-block">
                                            {{ __('messages.brand') }}
                                        </small>

                                        <strong>
                                            {{ $payment->order->product->brand ?? __('messages.na') }}
                                        </strong>

                                    </div>



                                    <div class="col-md-6 mb-3">

                                        <small class="text-muted d-block">
                                            {{ __('messages.model') }}
                                        </small>

                                        <strong>
                                            {{ $payment->order->product->model ?? __('messages.na') }}
                                        </strong>

                                    </div>



                                    <div class="col-md-6 mb-3">

                                        <small class="text-muted d-block">
                                            {{ __('messages.year') }}
                                        </small>

                                        <strong>
                                            {{ $payment->order->product->year ?? __('messages.na') }}
                                        </strong>

                                    </div>



                                    <div class="col-md-6 mb-3">

                                        <small class="text-muted d-block">
                                            {{ __('messages.color') }}
                                        </small>

                                        <strong>
                                            {{ $payment->order->product->color ?? __('messages.na') }}
                                        </strong>

                                    </div>



                                    <div class="col-md-6 mb-3">

                                        <small class="text-muted d-block">
                                            {{ __('messages.daily_price') }}
                                        </small>

                                        <strong>
                                            ${{ number_format($payment->order->product->daily_price ?? 0, 2) }}
                                        </strong>

                                    </div>


                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            @endif

                    </div>


        {{-- RIGHT SIDE --}}
        <div class="col-lg-4">


            {{-- UPDATE PAYMENT STATUS --}}
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        {{ __('messages.update_payment_status') }}
                    </h5>

                </div>


                <div class="card-body">


                    @if(session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif


                    @if(session('error'))

                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                    @endif


                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif



                    <form action="{{ route('payments.updateStatus', $payment->id) }}"
                          method="POST">

                        @csrf


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                {{ __('messages.payment_status') }}
                            </label>


                            <select name="payment_status"
                                    class="form-select">


                                <option value="pending"
                                    {{ $payment->payment_status == 'pending' ? 'selected' : '' }}>

                                    {{ __('messages.pending') }}

                                </option>


                                <option value="paid"
                                    {{ $payment->payment_status == 'paid' ? 'selected' : '' }}>

                                    {{ __('messages.paid') }}

                                </option>


                                <option value="failed"
                                    {{ $payment->payment_status == 'failed' ? 'selected' : '' }}>

                                    {{ __('messages.failed') }}

                                </option>


                            </select>

                        </div>




                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                {{ __('messages.transaction_id_optional') }}

                            </label>


                            <input type="text"
                                   name="transaction_id"
                                   class="form-control"
                                   value="{{ old('transaction_id', $payment->transaction_id) }}"
                                   placeholder="{{ __('messages.enter_transaction_id') }}">


                        </div>




                        <button type="submit"
                                class="btn btn-dark w-100">

                            {{ __('messages.update_payment') }}

                        </button>


                    </form>


                </div>

            </div>





            {{-- QUICK SUMMARY --}}
            <div class="card shadow-sm border-0">


                <div class="card-header bg-white">

                    <h5 class="mb-0">

                        {{ __('messages.quick_summary') }}

                    </h5>

                </div>




                <div class="card-body">


                    <ul class="list-group list-group-flush">



                        <li class="list-group-item d-flex justify-content-between px-0">

                            <span>
                                {{ __('messages.payment_id') }}
                            </span>

                            <strong>
                                #{{ $payment->id }}
                            </strong>

                        </li>




                        <li class="list-group-item d-flex justify-content-between px-0">

                            <span>
                                {{ __('messages.amount') }}
                            </span>

                            <strong>
                                ${{ number_format($payment->amount, 2) }}
                            </strong>

                        </li>




                        <li class="list-group-item d-flex justify-content-between px-0">

                            <span>
                                {{ __('messages.status') }}
                            </span>


                            <strong>
                                {{ ucfirst($payment->payment_status) }}
                            </strong>

                        </li>




                        <li class="list-group-item d-flex justify-content-between px-0">

                            <span>
                                {{ __('messages.method') }}
                            </span>


                            <strong>
                                {{ ucfirst($payment->payment_method) }}
                            </strong>

                        </li>




                        @if($payment->order)

                            <li class="list-group-item d-flex justify-content-between px-0">

                                <span>
                                    {{ __('messages.order_id') }}
                                </span>


                                <strong>
                                    #{{ $payment->order->id }}
                                </strong>

                            </li>

                        @endif



                    </ul>


                </div>


            </div>


        </div>


    </div>


</div>


@endsection

