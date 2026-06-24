@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2>{{ __('messages.products') }}</h2>
        </div>

        <div class="col-md-6 text-end">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                {{ __('messages.add_product') }}
            </a>
        </div>

    </div>


    @if(session('message'))

        <div class="alert alert-success">
            {{ session('message') }}
        </div>

    @endif


    <table class="table table-bordered table-striped">

        <thead>

            <tr>
                <th>{{ __('messages.id') }}</th>
                <th>{{ __('messages.image') }}</th>
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.category') }}</th>
                <th>{{ __('messages.location') }}</th>
                <th>{{ __('messages.brand') }}</th>
                <th>{{ __('messages.model') }}</th>
                <th>{{ __('messages.year') }}</th>
                <th>{{ __('messages.daily_price') }}</th>
                <th>{{ __('messages.status') }}</th>
                <th width="250">{{ __('messages.actions') }}</th>
            </tr>

        </thead>


        <tbody>


        @forelse($products as $product)

            <tr>

                <td>
                    {{ $product->id }}
                </td>


                <td>

                    @if($product->image)

                        <img
                            src="{{ asset('img/product/'.$product->image) }}"
                            width="80"
                            height="60"
                            alt="{{ $product->name }}"
                        >

                    @endif

                </td>


                <td>
                    {{ $product->name }}
                </td>


                <td>
                    {{ $product->category->title_en ?? '-' }}
                </td>


                <td>
                    {{ $product->location->city ?? '-' }}
                </td>


                <td>
                    {{ $product->brand }}
                </td>


                <td>
                    {{ $product->model }}
                </td>


                <td>
                    {{ $product->year }}
                </td>


                <td>
                    {{ $product->daily_price }}
                </td>


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


                <td>


                    <a
                        href="{{ route('products.show', $product->id) }}"
                        class="btn btn-info btn-sm"
                    >
                        {{ __('messages.view') }}
                    </a>


                    <a
                        href="{{ route('products.edit', $product->id) }}"
                        class="btn btn-warning btn-sm"
                    >
                        {{ __('messages.edit') }}
                    </a>



                    <form
                        action="{{ route('products.destroy', $product->id) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf
                        @method('DELETE')


                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('{{ __('messages.delete_this_product') }}')"
                        >
                            {{ __('messages.delete') }}
                        </button>


                    </form>


                </td>


            </tr>


        @empty


            <tr>

                <td colspan="11" class="text-center">

                    {{ __('messages.no_products_found') }}

                </td>

            </tr>


        @endforelse


        </tbody>


    </table>


</div>

@endsection

