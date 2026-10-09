
@extends('layouts.app')

@section('content')

<style>
    /* ==========================================
       PREMIUM CAR RENTAL REGISTER
    ========================================== */

    :root {
        --register-primary: #2563eb;
        --register-primary-dark: #1d4ed8;
        --register-gold: #d4a017;
        --register-dark: #0b1220;
        --register-muted: #778195;
        --register-border: #e7eaf0;
    }

    .register-page {
        min-height: calc(100vh - 70px);
        padding: 45px 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(circle at 10% 10%, rgba(37, 99, 235, .08), transparent 30%),
            radial-gradient(circle at 90% 90%, rgba(212, 160, 23, .09), transparent 28%),
            #f3f6fb;
    }

    .register-page::before,
    .register-page::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }

    .register-page::before {
        width: 280px;
        height: 280px;
        border: 1px solid rgba(37, 99, 235, .1);
        top: -100px;
        right: -80px;
    }

    .register-page::after {
        width: 200px;
        height: 200px;
        border: 1px solid rgba(212, 160, 23, .16);
        bottom: -70px;
        left: -50px;
    }

    .register-shell {
        width: 100%;
        max-width: 1080px;
        min-height: 690px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background: #fff;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 30px 90px rgba(15, 23, 42, .13);
        position: relative;
        z-index: 1;
        border: 1px solid rgba(255, 255, 255, .8);
    }

    /* ==========================================
       IMAGE PANEL
    ========================================== */

    .register-visual {
        position: relative;
        min-height: 690px;
        padding: 38px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        color: #fff;
        isolation: isolate;
        overflow: hidden;
        background-color: #101a2d;

        background-image:
            linear-gradient(
                180deg,
                rgba(5, 12, 25, .38) 0%,
                rgba(5, 12, 25, .12) 35%,
                rgba(5, 12, 25, .92) 100%
            ),
            url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1400&q=85');

        background-size: cover;
        background-position: center;
    }

    .register-visual::before {
        content: "";
        position: absolute;
        inset: 0;
        border: 1px solid rgba(255, 255, 255, .12);
        pointer-events: none;
        z-index: -1;
    }

    .register-brand {
        display: flex;
        align-items: center;
        gap: 13px;
        position: relative;
        z-index: 1;
    }

    .register-brand-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: rgba(255, 255, 255, .15);
        border: 1px solid rgba(255, 255, 255, .25);
        backdrop-filter: blur(12px);
        font-size: 22px;
        color: #f4c85a;
    }

    .register-brand-name {
        font-size: 19px;
        font-weight: 800;
        color: #fff;
        margin: 0;
        letter-spacing: .3px;
    }

    .register-brand-caption {
        display: block;
        margin-top: 3px;
        font-size: 11px;
        color: rgba(255, 255, 255, .75);
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .register-visual-content {
        position: relative;
        z-index: 1;
        max-width: 390px;
        margin-bottom: 15px;
    }

    .register-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(212, 160, 23, .18);
        border: 1px solid rgba(244, 200, 90, .4);
        color: #ffe39a;
        padding: 9px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 22px;
    }

    .register-eyebrow span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #f4c85a;
        box-shadow: 0 0 12px rgba(244, 200, 90, .8);
    }

    .register-visual-content h2 {
        color: #fff;
        font-size: clamp(30px, 3vw, 43px);
        line-height: 1.3;
        font-weight: 800;
        margin-bottom: 18px;
        letter-spacing: -.8px;
    }

    .register-visual-content h2 span {
        color: #f4c85a;
    }

    .register-visual-content p {
        color: rgba(255, 255, 255, .8);
        line-height: 1.9;
        font-size: 14px;
        margin: 0;
    }

    .register-visual-footer {
        position: relative;
        z-index: 1;
        padding-top: 23px;
        border-top: 1px solid rgba(255, 255, 255, .22);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .register-footer-item {
        display: flex;
        align-items: center;
        gap: 9px;
        color: rgba(255, 255, 255, .9);
        font-size: 12px;
        font-weight: 600;
    }

    .register-footer-item i {
        color: #f4c85a;
        font-size: 16px;
    }

    /* ==========================================
       FORM PANEL
    ========================================== */

    .register-form-panel {
        padding: 42px 48px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-width: 0;
    }

    .register-heading {
        margin-bottom: 27px;
    }

    .register-heading-label {
        display: inline-block;
        color: var(--register-primary);
        background: rgba(37, 99, 235, .08);
        padding: 8px 13px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .register-heading h1 {
        color: var(--register-dark);
        font-size: 31px;
        font-weight: 800;
        line-height: 1.35;
        margin-bottom: 10px;
        letter-spacing: -.6px;
    }

    .register-heading p {
        color: var(--register-muted);
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }

    .register-field {
        margin-bottom: 19px;
    }

    .register-field label {
        display: block;
        color: #293348;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .register-input-wrap {
        position: relative;
    }

    .register-input-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 16px;
        color: #98a2b3;
        font-size: 15px;
        pointer-events: none;
        transition: color .2s ease;
    }

    .register-input {
        display: block;
        width: 100%;
        height: 53px;
        padding: 12px 45px;
        border: 1px solid var(--register-border);
        border-radius: 13px;
        background: #f9fafc;
        color: #182230;
        font-size: 14px;
        outline: none;
        box-shadow: none;
        transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
    }

    .register-input::placeholder {
        color: #a0a8b7;
    }

    .register-input:focus {
        background: #fff;
        border-color: var(--register-primary);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, .09);
    }

    .register-input-wrap:focus-within .register-input-icon {
        color: var(--register-primary);
    }

    .register-input.is-invalid {
        border-color: #dc3545;
    }

    .register-field .invalid-feedback {
        display: block;
        font-size: 12px;
        margin-top: 7px;
    }

    .register-toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #8a94a6;
        width: 32px;
        height: 36px;
        border-radius: 8px;
        cursor: pointer;
        transition: color .2s ease;
    }

    .register-toggle-password:hover {
        color: var(--register-primary);
    }

    .register-submit {
        width: 100%;
        min-height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 11px;
        border: none;
        border-radius: 13px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
        font-size: 14px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(37, 99, 235, .22);
        cursor: pointer;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .register-submit:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(37, 99, 235, .3);
    }

    .register-submit:active {
        transform: translateY(0);
    }

    .register-login-link {
        text-align: center;
        margin-top: 22px;
        color: #778195;
        font-size: 13px;
        line-height: 1.8;
    }

    .register-login-link a {
        color: var(--register-primary);
        font-weight: 800;
        text-decoration: none;
        margin-left: 4px;
    }

    .register-login-link a:hover {
        color: var(--register-primary-dark);
        text-decoration: underline;
    }

    .register-security-note {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        color: #929bad;
        font-size: 11px;
        text-align: center;
    }

    .register-security-note i {
        color: #16a34a;
        font-size: 13px;
    }

    /* ==========================================
       RESPONSIVE
    ========================================== */

    @media (max-width: 991px) {
        .register-shell {
            max-width: 760px;
            grid-template-columns: .85fr 1.15fr;
        }

        .register-visual {
            padding: 28px;
            min-height: 650px;
        }

        .register-form-panel {
            padding: 35px 30px;
        }

        .register-visual-content h2 {
            font-size: 31px;
        }

        .register-visual-footer {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 767px) {
        .register-page {
            padding: 25px 14px;
            min-height: auto;
        }

        .register-shell {
            max-width: 480px;
            min-height: auto;
            display: flex;
            flex-direction: column;
            border-radius: 22px;
        }

        .register-visual {
            min-height: 260px;
            padding: 24px;
            background-position: center 55%;
        }

        .register-brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            font-size: 19px;
        }

        .register-brand-name {
            font-size: 16px;
        }

        .register-brand-caption {
            font-size: 9px;
        }

        .register-visual-content {
            margin-top: 38px;
            margin-bottom: 0;
        }

        .register-eyebrow {
            margin-bottom: 12px;
            padding: 7px 11px;
            font-size: 10px;
        }

        .register-visual-content h2 {
            font-size: 27px;
            margin-bottom: 9px;
        }

        .register-visual-content p {
            font-size: 12px;
            line-height: 1.7;
        }

        .register-visual-footer {
            display: none;
        }

        .register-form-panel {
            padding: 30px 24px;
        }

        .register-heading {
            margin-bottom: 23px;
        }

        .register-heading h1 {
            font-size: 27px;
        }

        .register-heading p {
            font-size: 13px;
        }

        .register-input {
            height: 51px;
        }

        .register-submit {
            min-height: 52px;
        }
    }

    @media (max-width: 360px) {
        .register-form-panel {
            padding: 26px 18px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .register-page *,
        .register-page *::before,
        .register-page *::after {
            transition: none !important;
            animation: none !important;
        }
    }
</style>

<div class="register-page">

    <div class="register-shell">

        {{-- IMAGE AND WELCOME PANEL --}}
        <aside class="register-visual">

            <div class="register-brand">

                <div class="register-brand-icon">
                    <i class="fas fa-car-side"></i>
                </div>

                <div>
                    <h3 class="register-brand-name">DriveEase</h3>

                    <span class="register-brand-caption">
                        Premium Car Rental
                    </span>
                </div>

            </div>

            <div class="register-visual-content">

                <div class="register-eyebrow">
                    <span></span>
                    JOIN OUR COMMUNITY
                </div>

                <h2>
                    Your Journey,
                    <span>Your Rules.</span>
                </h2>

                <p>
                    Create your account and discover a simpler way
                    to find your perfect car. More freedom, more
                    comfort, and more memorable journeys.
                </p>

            </div>

            <div class="register-visual-footer">

                <div class="register-footer-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Secure Account</span>
                </div>

                <div class="register-footer-item">
                    <i class="fas fa-car"></i>
                    <span>Your Next Adventure</span>
                </div>

            </div>

        </aside>

        {{-- REGISTRATION FORM --}}
        <main class="register-form-panel">

            <div class="register-heading">

                <span class="register-heading-label">
                    CREATE YOUR ACCOUNT
                </span>

                <h1>{{ __('Register') }}</h1>

                <p>
                    Join us today and get ready for your next journey.
                </p>

            </div>

            {{-- GENERAL VALIDATION ERRORS --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- NAME --}}
                <div class="register-field">

                    <label for="name">
                        {{ __('Name') }}
                    </label>

                    <div class="register-input-wrap">

                        <i class="fas fa-user register-input-icon"></i>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="register-input @error('name') is-invalid @enderror"
                            placeholder="Enter your full name"
                            required
                            autocomplete="name"
                            autofocus
                        >

                    </div>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                {{-- EMAIL --}}
                <div class="register-field">

                    <label for="email">
                        {{ __('Email Address') }}
                    </label>

                    <div class="register-input-wrap">

                        <i class="fas fa-envelope register-input-icon"></i>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="register-input @error('email') is-invalid @enderror"
                            placeholder="name@example.com"
                            required
                            autocomplete="email"
                            dir="ltr"
                        >

                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                {{-- PASSWORD --}}
                <div class="register-field">

                    <label for="password">
                        {{ __('Password') }}
                    </label>

                    <div class="register-input-wrap">

                        <i class="fas fa-lock register-input-icon"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="register-input @error('password') is-invalid @enderror"
                            placeholder="Create a strong password"
                            required
                            autocomplete="new-password"
                            dir="ltr"
                        >

                        <button
                            type="button"
                            class="register-toggle-password"
                            data-password-target="password"
                            aria-label="Show password"
                            aria-pressed="false"
                        >
                            <i class="fas fa-eye"></i>
                        </button>

                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                {{-- CONFIRM PASSWORD --}}
                <div class="register-field">

                    <label for="password-confirm">
                        {{ __('Confirm Password') }}
                    </label>

                    <div class="register-input-wrap">

                        <i class="fas fa-lock register-input-icon"></i>

                        <input
                            id="password-confirm"
                            type="password"
                            name="password_confirmation"
                            class="register-input"
                            placeholder="Re-enter your password"
                            required
                            autocomplete="new-password"
                            dir="ltr"
                        >

                        <button
                            type="button"
                            class="register-toggle-password"
                            data-password-target="password-confirm"
                            aria-label="Show password"
                            aria-pressed="false"
                        >
                            <i class="fas fa-eye"></i>
                        </button>

                    </div>

                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="register-submit">

                    <i class="fas fa-user-plus"></i>

                    <span>{{ __('Register') }}</span>

                </button>

            </form>

            {{-- LOGIN LINK --}}
            <div class="register-login-link">

                {{ __('Already have an account?') }}

                <a href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>

            </div>

            <div class="register-security-note">

                <i class="fas fa-shield-alt"></i>

                <span>Your information is protected by secure authentication.</span>

            </div>

        </main>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.register-toggle-password').forEach(function (button) {

            button.addEventListener('click', function () {

                const targetId = button.getAttribute('data-password-target');
                const input = document.getElementById(targetId);
                const icon = button.querySelector('i');

                if (!input || !icon) {
                    return;
                }

                const shouldShow = input.type === 'password';

                input.type = shouldShow ? 'text' : 'password';

                icon.classList.toggle('fa-eye', !shouldShow);
                icon.classList.toggle('fa-eye-slash', shouldShow);

                button.setAttribute(
                    'aria-pressed',
                    shouldShow ? 'true' : 'false'
                );

                button.setAttribute(
                    'aria-label',
                    shouldShow ? 'Hide password' : 'Show password'
                );

            });

        });

    });
</script>

@endsection

