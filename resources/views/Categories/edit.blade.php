@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-10 m-auto">

            <form method="POST"
                  action="{{ route('categories.update', $category->id) }}"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input type="hidden"
                       name="old_id"
                       value="{{ $category->id }}">

                <label>ID</label>

                <input type="text"
                       name="id"
                       value="{{ $category->id }}"
                       class="form-control mb-3">

                @error('id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <label>{{ __('messages.image') }}</label>

                <input type="file"
                       name="cate_image"
                       class="form-control mb-3">

                @error('cate_image')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                @if($category->cate_image)
                    <div class="mb-3">
                        <img src="{{ asset('img/category/'.$category->cate_image) }}"
                             width="120">
                    </div>
                @endif

                <label>{{ __('messages.title_en') }}</label>

                <input type="text"
                       name="title_en"
                       value="{{ $category->title_en }}"
                       class="form-control mb-3">

                @error('title_en')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <label>{{ __('messages.title_ar') }}</label>

                <input type="text"
                       name="title_ar"
                       value="{{ $category->title_ar }}"
                       class="form-control mb-3">

                @error('title_ar')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <label>{{ __('messages.description_en') }}</label>

                <textarea name="description_en"
                          class="form-control mb-3"
                          rows="3">{{ $category->description_en }}</textarea>

                @error('description_en')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <label>{{ __('messages.description_ar') }}</label>

                <textarea name="description_ar"
                          class="form-control mb-3"
                          rows="3">{{ $category->description_ar }}</textarea>

                @error('description_ar')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit"
                        class="btn btn-success w-100">

                    {{ __('messages.update_category') }}

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
