<!DOCTYPE html>
<html>
<head>
    <title>{{ __('Orders Report') }}</title>
</head>
<body>

<h2>{{ __('Orders Report') }}</h2>

<table border="1" width="100%" cellpadding="5">

    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Customer') }}</th>
        <th>{{ __('Car') }}</th>
        <th>{{ __('Total Price') }}</th>
        <th>{{ __('Status') }}</th>
    </tr>

    @foreach($orders as $order)

        <tr>

            <td>{{ $order->id }}</td>

            <td>
                {{ $order->user->name ?? '' }}
            </td>

            <td>
                {{ $order->product->name ?? '' }}
            </td>

            <td>
                ${{ number_format($order->total_price, 2) }}
            </td>

            <td>
                {{ ucfirst($order->status) }}
            </td>

        </tr>

    @endforeach

</table>

</body>
</html>
