@extends('layouts.app')

@section('content')

<div class="container py-4">
<div class="card shadow-sm">

    <div class="card-header bg-dark text-white">
        <h4>{{ __('messages.categories') }}</h4>
    </div>

    <div class="card-body">

        <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">
            + {{ __('messages.create_category') }}
        </a>

        <table class="table table-bordered table-hover text-center">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('messages.title') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>

            <tbody>

                @foreach($result as $category)

                    <tr>
                        <td>{{ $category->id }}</td>

                        <td>
                            {{ app()->getLocale() == 'ar'
                                ? ($category->title_ar ?? $category->title ?? '-')
                                : ($category->title_en ?? $category->title ?? '-') }}
                        </td>

                        <td>

                            <a href="{{ route('categories.show', $category->id) }}"
                               class="btn btn-info btn-sm">
                                {{ __('messages.show') }}
                            </a>

                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="btn btn-warning btn-sm">
                                {{ __('messages.edit') }}
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}"
                                  method="POST"
                                  style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    {{ __('messages.delete') }}
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection

