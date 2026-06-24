@extends('layouts.app')

@section('content')

<div class="container py-4">

<div class="card shadow border-0">

<div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center">

<div>
<h3 class="mb-1">
{{ __('messages.payments_management') }}
</h3>

<p class="text-muted mb-0">
{{ __('messages.manage_payments_description') }}
</p>

</div>


<span class="badge bg-primary fs-6">

{{ __('messages.total_payments') }}:
{{ $payments->count() }}

</span>

</div>


<div class="card-body">


@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

{{ session('success') }}

<button type="button"
class="btn-close"
data-bs-dismiss="alert"></button>

</div>

@endif



@if(session('error'))

<div class="alert alert-danger alert-dismissible fade show">

{{ session('error') }}

<button type="button"
class="btn-close"
data-bs-dismiss="alert"></button>

</div>

@endif



<div class="card border-0 shadow-sm mb-4">

<div class="card-body">


<form method="GET"
action="{{ route('payments.index') }}"
class="row g-3">


<div class="col-md-3">

<label class="form-label">
{{ __('messages.payment_status') }}
</label>


<select name="payment_status"
class="form-select">


<option value="">
{{ __('messages.all_statuses') }}
</option>


<option value="pending"
{{ request('payment_status')=='pending'?'selected':'' }}>
{{ __('messages.pending') }}
</option>


<option value="paid"
{{ request('payment_status')=='paid'?'selected':'' }}>
{{ __('messages.paid') }}
</option>


<option value="failed"
{{ request('payment_status')=='failed'?'selected':'' }}>
{{ __('messages.failed') }}
</option>


</select>

</div>



<div class="col-md-3">

<label class="form-label">
{{ __('messages.payment_method') }}
</label>


<select name="payment_method"
class="form-select">


<option value="">
{{ __('messages.all_methods') }}
</option>


<option value="cash">
{{ __('messages.cash') }}
</option>


<option value="card">
{{ __('messages.card') }}
</option>


<option value="wallet">
{{ __('messages.wallet') }}
</option>


</select>

</div>



<div class="col-md-2">

<label class="form-label">
{{ __('messages.from_date') }}
</label>


<input type="date"
name="from_date"
value="{{ request('from_date') }}"
class="form-control">

</div>



<div class="col-md-2">

<label class="form-label">
{{ __('messages.to_date') }}
</label>


<input type="date"
name="to_date"
value="{{ request('to_date') }}"
class="form-control">

</div>



<div class="col-md-2 d-flex align-items-end">

<button class="btn btn-primary w-100">

{{ __('messages.filter') }}

</button>

</div>



<div class="col-md-2 d-flex align-items-end">

<a href="{{ route('payments.index') }}"
class="btn btn-secondary w-100">

{{ __('messages.reset') }}

</a>

</div>


</form>


</div>

</div>



<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">


<thead class="table-dark text-center">

<tr>

<th>#</th>

<th>{{ __('messages.customer') }}</th>

<th>{{ __('messages.car') }}</th>

<th>{{ __('messages.order') }}</th>

<th>{{ __('messages.amount') }}</th>

<th>{{ __('messages.method') }}</th>

<th>{{ __('messages.transaction_id') }}</th>

<th>{{ __('messages.status') }}</th>

<th>{{ __('messages.paid_at') }}</th>

<th>{{ __('messages.actions') }}</th>

</tr>

</thead>



<tbody>


@forelse($payments as $payment)


<tr>


<td class="text-center fw-bold">
{{ $payment->id }}
</td>



<td>

<div class="fw-semibold">

{{ $payment->order->user->name ?? 'N/A' }}

</div>

<small class="text-muted">

{{ $payment->order->user->email ?? '' }}

</small>

</td>



<td>

{{ $payment->order->product->name ?? 'N/A' }}

</td>



<td class="text-center">

<a href="{{ route('orders.show',$payment->order_id) }}"
class="btn btn-sm btn-outline-dark">

{{ __('messages.order') }}
#{{ $payment->order_id }}

</a>

</td>



<td class="fw-bold text-success">

${{ number_format($payment->amount,2) }}

</td>



<td>

{{ ucfirst($payment->payment_method) }}

</td>



<td>

{{ $payment->transaction_id ?? '—' }}

</td>



<td>


@if($payment->payment_status=='pending')

<span class="badge bg-warning text-dark">

{{ __('messages.pending') }}

</span>


@elseif($payment->payment_status=='paid')

<span class="badge bg-success">

{{ __('messages.paid') }}

</span>


@elseif($payment->payment_status=='failed')

<span class="badge bg-danger">

{{ __('messages.failed') }}

</span>


@endif


</td>



<td>

@if($payment->paid_at)

{{ $payment->paid_at->format('Y-m-d') }}

@else

{{ __('messages.not_paid_yet') }}

@endif

</td>



<td>


<a href="{{ route('payments.show',$payment->id) }}"
class="btn btn-sm btn-outline-primary">

{{ __('messages.view_payment') }}

</a>



<form action="{{ route('payments.updateStatus',$payment->id) }}"
method="POST"
class="mt-2">

@csrf


<select name="payment_status"
class="form-select form-select-sm">


<option value="pending">
{{ __('messages.pending') }}
</option>


<option value="paid">
{{ __('messages.paid') }}
</option>


<option value="failed">
{{ __('messages.failed') }}
</option>


</select>


<button class="btn btn-success btn-sm mt-2">

{{ __('messages.update') }}

</button>


</form>


</td>


</tr>


@empty


<tr>

<td colspan="10"
class="text-center py-4 text-muted">

{{ __('messages.no_payments_found') }}

</td>

</tr>


@endforelse


</tbody>


</table>


</div>


</div>

</div>


@endsection
