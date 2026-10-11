
@extends('layouts.app')

@section('content')

<style>
    .details-page {
        min-height: 80vh;
        padding: 55px 0 70px;
        background: #101a15;
        color: #e8eee9;
    }

    .details-card {
        background: #1b2921;
        border: 1px solid #35453a;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.16);
    }

    .details-header {
        padding: 25px 30px;
        background: #223229;
        border-bottom: 1px solid #35453a;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .details-title {
        margin: 0;
        color: #f0f4ef;
        font-size: 25px;
        font-weight: 700;
    }

    .details-subtitle {
        margin: 8px 0 0;
        color: #aebbb1;
        font-size: 14px;
        line-height: 1.8;
    }

    .details-id {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 52px;
        height: 44px;
        padding: 0 12px;
        color: #d4ead9;
        background: #17241c;
        border: 1px solid #43594a;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        direction: ltr;
    }

    .details-body {
        padding: 28px 30px;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .details-item {
        min-width: 0;
        padding: 21px;
        background: #17241c;
        border: 1px solid #34463a;
        border-radius: 12px;
        transition: border-color 0.25s ease,
                    background 0.25s ease,
                    transform 0.25s ease;
    }

    .details-item:hover {
        background: #1d2d23;
        border-color: #54765e;
        transform: translateY(-2px);
    }

    .details-label {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 13px;
        color: #b9d9c2;
        font-size: 13px;
        font-weight: 600;
    }

    .details-label i {
        width: 17px;
        color: #62a879;
        text-align: center;
    }

    .details-value {
        margin: 0;
        color: #edf2ed;
        font-size: 15px;
        line-height: 1.9;
        overflow-wrap: anywhere;
        white-space: pre-line;
    }

    .details-value-en {
        direction: ltr;
        text-align: left;
    }

    .details-status {
        display: inline-block;
        padding: 6px 13px;
        color: #bce8c9;
        background: rgba(57, 132, 92, 0.2);
        border: 1px solid rgba(85, 164, 116, 0.35);
        border-radius: 7px;
        font-size: 13px;
        font-weight: 600;
    }

    .details-date {
        direction: ltr;
        display: inline-block;
        color: #e0e8e1;
    }

    .details-footer {
        padding: 20px 30px;
        background: #19261e;
        border-top: 1px solid #35453a;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .details-footer-note {
        margin: 0;
        color: #9eafa2;
        font-size: 13px;
    }

    .details-home-btn {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 9px;
        padding: 11px 20px;
        color: #ffffff !important;
        background: #39845c;
        border: 1px solid #39845c;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .details-home-btn:hover {
        background: #2e704c;
        border-color: #2e704c;
        color: #ffffff !important;
        transform: translateY(-1px);
        box-shadow: 0 5px 14px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 767px) {
        .details-page {
            padding: 30px 0 45px;
        }

        .details-header {
            padding: 20px;
        }

        .details-title {
            font-size: 20px;
        }

        .details-body {
            padding: 20px;
        }

        .details-grid {
            grid-template-columns: 1fr;
            gap: 13px;
        }

        .details-item {
            padding: 17px;
        }

        .details-footer {
            padding: 20px;
            flex-direction: column;
            align-items: stretch;
        }

        .details-home-btn {
            width: 100%;
        }
    }
</style>

<div class="details-page">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">

                <div class="details-card">

                    {{-- Page Header --}}
                    <div class="details-header">
                        <div>
                            <h4 class="details-title">
                                <i class="fa-solid fa-circle-info me-2"
                                   style="color: #62a879;"></i>
                                {{ __('messages.user_details') }}
                            </h4>

                            <p class="details-subtitle">
                                Review the record information and details.
                            </p>
                        </div>

                        <span class="details-id">
                            #{{ $result->id }}
                        </span>
                    </div>

                    {{-- Details --}}
                    <div class="details-body">

                        <div class="details-grid">

                            {{-- English Title --}}
                            <div class="details-item">
                                <div class="details-label">
                                    <i class="fa-solid fa-heading"></i>
                                    {{ __('messages.title_en') }}
                                </div>

                                <p class="details-value details-value-en">
                                    {{ $result->title_en ?: '—' }}
                                </p>
                            </div>

                            {{-- Arabic Title --}}
                            <div class="details-item">
                                <div class="details-label">
                                    <i class="fa-solid fa-heading"></i>
                                    {{ __('messages.title_ar') }}
                                </div>

                                <p class="details-value">
                                    {{ $result->title_ar ?: '—' }}
                                </p>
                            </div>

                            {{-- English Description --}}
                            <div class="details-item">
                                <div class="details-label">
                                    <i class="fa-solid fa-align-left"></i>
                                    {{ __('messages.description_en') }}
                                </div>

                                <p class="details-value details-value-en">
                                    {{ $result->description_en ?: '—' }}
                                </p>
                            </div>

                            {{-- Arabic Description --}}
                            <div class="details-item">
                                <div class="details-label">
                                    <i class="fa-solid fa-align-right"></i>
                                    {{ __('messages.description_ar') }}
                                </div>

                                <p class="details-value">
                                    {{ $result->description_ar ?: '—' }}
                                </p>
                            </div>

                            {{-- Status --}}
                            <div class="details-item">
                                <div class="details-label">
                                    <i class="fa-solid fa-circle-check"></i>
                                    {{ __('messages.status') }}
                                </div>

                                <p class="details-value">
                                    <span class="details-status">
                                        {{ $result->status }}
                                    </span>
                                </p>
                            </div>

                            {{-- Created At --}}
                            <div class="details-item">
                                <div class="details-label">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ __('messages.created_at') }}
                                </div>

                                <p class="details-value">
                                    <span class="details-date">
                                        {{ $result->created_at
                                            ? $result->created_at->format('Y-m-d H:i')
                                            : '—' }}
                                    </span>
                                </p>
                            </div>

                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="details-footer">
                        <p class="details-footer-note">
                            <i class="fa-solid fa-shield-halved me-1"></i>
                            Car Rental — Record #{{ $result->id }}
                        </p>

                        <a href="{{ route('home') }}"
                           class="details-home-btn">
                            <i class="fa-solid fa-house"></i>
                            <span>{{ __('messages.home') }}</span>
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
