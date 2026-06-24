@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            <h3>{{ __('messages.product_details') }}</h3>
        </div>


        <div class="card-body">

            <div class="row">


                <div class="col-md-4 text-center">

                    @if($product->image)

                        <img
                            src="{{ asset('img/product/'.$product->image) }}"
                            class="img-fluid rounded"
                            style="max-height:300px;"
                            alt="{{ $product->name }}"
                        >

                    @endif

                </div>



                <div class="col-md-8">

                    <table class="table table-bordered">


                        <tr>
                            <th>{{ __('messages.id') }}</th>
                            <td>{{ $product->id }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.name') }}</th>
                            <td>{{ $product->name }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.category') }}</th>
                            <td>
                                {{ $product->category->title_en ?? '-' }}
                            </td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.location') }}</th>
                            <td>
                                {{ $product->location->city ?? '-' }}
                                -
                                {{ $product->location->area ?? '' }}
                            </td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.brand') }}</th>
                            <td>{{ $product->brand }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.model') }}</th>
                            <td>{{ $product->model }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.year') }}</th>
                            <td>{{ $product->year }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.color') }}</th>
                            <td>{{ $product->color }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.transmission') }}</th>
                            <td>
                                {{ ucfirst($product->transmission) }}
                            </td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.fuel_type') }}</th>
                            <td>
                                {{ ucfirst($product->fuel_type) }}
                            </td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.seats') }}</th>
                            <td>{{ $product->seats }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.daily_price') }}</th>
                            <td>{{ $product->daily_price }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.weekly_price') }}</th>
                            <td>{{ $product->weekly_price }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.monthly_price') }}</th>
                            <td>{{ $product->monthly_price }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.deposit_amount') }}</th>
                            <td>{{ $product->deposit_amount }}</td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.status') }}</th>
                            <td>

                                @if($product->status == '1')

                                    <span class="badge bg-success">
                                        {{ __('messages.active') }}
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        {{ __('messages.inactive') }}
                                    </span>

                                @endif

                            </td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.available') }}</th>
                            <td>

                                @if($product->available)

                                    {{ __('messages.yes') }}

                                @else

                                    {{ __('messages.no') }}

                                @endif

                            </td>
                        </tr>


                        <tr>
                            <th>{{ __('messages.description') }}</th>
                            <td>
                                {{ $product->description }}
                            </td>
                        </tr>


                    </table>



                    <a
                        href="{{ route('products.index') }}"
                        class="btn btn-secondary"
                    >
                        {{ __('messages.back') }}
                    </a>


                    <a
                        href="{{ route('products.edit',$product->id) }}"
                        class="btn btn-warning"
                    >
                        {{ __('messages.edit') }}
                    </a>


                </div>


            </div>


        </div>


    </div>


</div>


@endsection
