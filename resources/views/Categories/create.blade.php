@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">

            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>ID</label>
                <input type="text"
                       name="id"
                       class="form-control mb-4"
                       value="{{ old('id') }}">

                @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{ __('messages.image') }}</label>
                <input type="file"
                       name="cate_image"
                       class="form-control mb-4">

                @error('cate_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{ __('messages.title_en') }}</label>
                <input type="text"
                       name="title_en"
                       class="form-control mb-4"
                       value="{{ old('title_en') }}">

                @error('title_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{ __('messages.title_ar') }}</label>
                <input type="text"
                       name="title_ar"
                       class="form-control mb-4"
                       value="{{ old('title_ar') }}">

                @error('title_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{ __('messages.description_en') }}</label>
                <input type="text"
                       name="description_en"
                       class="form-control mb-4"
                       value="{{ old('description_en') }}">

                @error('description_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{ __('messages.description_ar') }}</label>
                <input type="text"
                       name="description_ar"
                       class="form-control mb-4"
                       value="{{ old('description_ar') }}">

                @error('description_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="submit"
                       value="{{ __('messages.create_new_category') }}"
                       class="btn btn-success d-block w-100">

            </form>

        </div>
    </div>
</div>

@endsection
