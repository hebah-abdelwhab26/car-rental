
@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">

            <div class="row align-items-center g-3">

                <div class="col-md-6">
                    <h4 class="mb-0">
                        {{ __('messages.products') }}
                    </h4>
                </div>

                <div class="col-md-6 text-md-end">

                    <a href="{{ route('products.create') }}"
                       class="btn btn-success w-100 w-md-auto">

                        <i class="fas fa-plus-circle me-1"></i>

                        {{ __('messages.add_product') }}

                    </a>

                </div>

            </div>

        </div>

        <div class="card-body">

            @if(session('message'))

                <div class="alert alert-success">
                    {{ session('message') }}
                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle text-center">

                    <thead class="table-dark">

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
                            <th style="min-width:220px">
                                {{ __('messages.actions') }}
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>{{ $product->id }}</td>

                            <td>

                                @if($product->image)

                                    <img
                                        src="{{ asset($product->image) }}"
                                        class="img-fluid rounded shadow-sm"
                                        style="width:90px;height:65px;object-fit:cover;"
                                        alt="{{ $product->name }}"
                                        loading="lazy"
                                    >

                                @else

                                    <span class="text-muted">
                                        {{ __('messages.no_image') }}
                                    </span>

                                @endif

                            </td>

                            <td>{{ $product->name }}</td>

                            <td>{{ $product->category->title_en ?? '-' }}</td>

                            <td>{{ $product->location->city ?? '-' }}</td>

                            <td>{{ $product->brand }}</td>

                            <td>{{ $product->model }}</td>

                            <td>{{ $product->year }}</td>

                            <td>{{ $product->daily_price }}</td>

                            <td>

                                @if($product->status == '1')

                                    <span class="badge bg-success px-3 py-2">
                                        {{ __('messages.active') }}
                                    </span>

                                @else

                                    <span class="badge bg-danger px-3 py-2">
                                        {{ __('messages.inactive') }}
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-grid d-md-flex gap-2 justify-content-center">

                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>

                                        <span class="ms-1">
                                            {{ __('messages.view') }}
                                        </span>

                                    </a>

                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                        <span class="ms-1">
                                            {{ __('messages.edit') }}
                                        </span>

                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm w-100"
                                            onclick="return confirm('{{ __('messages.delete_this_product') }}')">

                                            <i class="fas fa-trash"></i>

                                            <span class="ms-1">
                                                {{ __('messages.delete') }}
                                            </span>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="11" class="text-center py-4">
                                {{ __('messages.no_products_found') }}
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

