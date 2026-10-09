
@extends('layouts.app')

@section('content')

<style>
    /* ==========================================
       PREMIUM CAR RENTAL LOGIN
    ========================================== */

    :root {
        --login-primary: #2563eb;
        --login-primary-dark: #1d4ed8;
        --login-gold: #d4a017;
        --login-dark: #0b1220;
        --login-muted: #778195;
        --login-border: #e7eaf0;
    }

    body {
        background: #f3f6fb;
    }

    .login-page {
        min-height: calc(100vh - 70px);
        padding: 55px 18px;
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

    .login-page::before,
    .login-page::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }

    .login-page::before {
        width: 280px;
        height: 280px;
        border: 1px solid rgba(37, 99, 235, .1);
        top: -100px;
        right: -80px;
    }

    .login-page::after {
        width: 200px;
        height: 200px;
        border: 1px solid rgba(212, 160, 23, .16);
        bottom: -70px;
        left: -50px;
    }

    .login-shell {
        width: 100%;
        max-width: 1080px;
        min-height: 620px;
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

    .login-visual {
        position: relative;
        min-height: 620px;
        padding: 38px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        color: #fff;
        isolation: isolate;
        overflow: hidden;

        background-color: #101a2d;

        /* صورة السيارة: يمكن استبدالها بصورة محلية */
        background-image:
            linear-gradient(
                180deg,
                rgba(5, 12, 25, .38) 0%,
                rgba(5, 12, 25, .12) 35%,
                rgba(5, 12, 25, .9) 100%
            ),
            url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1400&q=85');

        background-size: cover;
        background-position: center;
    }

    .login-visual::before {
        content: "";
        position: absolute;
        inset: 0;
        border: 1px solid rgba(255, 255, 255, .12);
        pointer-events: none;
        z-index: -1;
    }

    .visual-brand {
        display: flex;
        align-items: center;
        gap: 13px;
        position: relative;
        z-index: 1;
    }

    .visual-brand-icon {
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

    .visual-brand-name {
        font-size: 19px;
        font-weight: 800;
        color: #fff;
        margin: 0;
        letter-spacing: .3px;
    }

    .visual-brand-caption {
        display: block;
        margin-top: 3px;
        font-size: 11px;
        color: rgba(255, 255, 255, .75);
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .visual-content {
        position: relative;
        z-index: 1;
        max-width: 390px;
        margin-bottom: 15px;
    }

    .visual-eyebrow {
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

    .visual-eyebrow span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #f4c85a;
        box-shadow: 0 0 12px rgba(244, 200, 90, .8);
    }

    .visual-content h2 {
        color: #fff;
        font-size: clamp(30px, 3vw, 43px);
        line-height: 1.3;
        font-weight: 800;
        margin-bottom: 18px;
        letter-spacing: -.8px;
    }

    .visual-content h2 span {
        color: #f4c85a;
    }

    .visual-content p {
        color: rgba(255, 255, 255, .8);
        line-height: 1.9;
        font-size: 14px;
        margin: 0;
    }

    .visual-footer {
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

    .visual-footer-item {
        display: flex;
        align-items: center;
        gap: 9px;
        color: rgba(255, 255, 255, .9);
        font-size: 12px;
        font-weight: 600;
    }

    .visual-footer-item i {
        color: #f4c85a;
        font-size: 16px;
    }

    /* ==========================================
       FORM PANEL
    ========================================== */

    .login-form-panel {
        padding: 55px 52px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-width: 0;
    }

    .login-mobile-brand {
        display: none;
    }

    .login-heading {
        margin-bottom: 32px;
    }

    .login-heading .heading-label {
        display: inline-block;
        color: var(--login-primary);
        background: rgba(37, 99, 235, .08);
        padding: 8px 13px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 17px;
    }

    .login-heading h1 {
        color: var(--login-dark);
        font-size: 31px;
        font-weight: 800;
        line-height: 1.35;
        margin-bottom: 11px;
        letter-spacing: -.6px;
    }

    .login-heading p {
        color: var(--login-muted);
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }

    .login-alert {
        border-radius: 12px;
        padding: 12px 15px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .login-field {
        margin-bottom: 22px;
    }

    .login-field label {
        display: block;
        color: #293348;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .login-input-wrap {
        position: relative;
    }

    .login-input-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 17px;
        color: #98a2b3;
        font-size: 16px;
        pointer-events: none;
        transition: color .2s ease;
    }

    .login-input {
        display: block;
        width: 100%;
        height: 55px;
        padding: 12px 47px 12px 45px;
        border: 1px solid var(--login-border);
        border-radius: 13px;
        background: #f9fafc;
        color: #182230;
        font-size: 14px;
        outline: none;
        box-shadow: none;
        transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
    }

    .login-input::placeholder {
        color: #a0a8b7;
    }

    .login-input:focus {
        background: #fff;
        border-color: var(--login-primary);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, .09);
    }

    .login-input-wrap:focus-within .login-input-icon {
        color: var(--login-primary);
    }

    .login-input.is-invalid {
        border-color: #dc3545;
    }

    .login-input.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(220, 53, 69, .08);
    }

    .login-toggle-password {
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

    .login-toggle-password:hover {
        color: var(--login-primary);
    }

    .login-field .invalid-feedback {
        display: block;
        font-size: 12px;
        margin-top: 7px;
    }

    .login-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 25px;
    }

    .login-remember {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin: 0;
        color: #596579;
        font-size: 13px;
        cursor: pointer;
        user-select: none;
    }

    .login-remember input {
        width: 16px;
        height: 16px;
        accent-color: var(--login-primary);
        cursor: pointer;
        margin: 0;
    }

    .login-forgot {
        color: var(--login-primary);
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: color .2s ease;
    }

    .login-forgot:hover {
        color: var(--login-primary-dark);
        text-decoration: underline;
    }

    .login-submit {
        position: relative;
        width: 100%;
        min-height: 55px;
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

    .login-submit:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(37, 99, 235, .3);
    }

    .login-submit:active {
        transform: translateY(0);
    }

    .login-security-note {
        margin-top: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        color: #929bad;
        font-size: 11px;
        text-align: center;
    }

    .login-security-note i {
        color: #16a34a;
        font-size: 13px;
    }

    .login-bottom-note {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #edf0f5;
        color: #a0a8b7;
        font-size: 11px;
        line-height: 1.8;
    }

    /* ==========================================
       RESPONSIVE
    ========================================== */

    @media (max-width: 991px) {
        .login-shell {
            max-width: 760px;
            grid-template-columns: .85fr 1.15fr;
        }

        .login-visual {
            padding: 28px;
            min-height: 590px;
        }

        .login-form-panel {
            padding: 42px 32px;
        }

        .visual-content h2 {
            font-size: 31px;
        }

        .visual-footer {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 767px) {
        .login-page {
            padding: 25px 14px;
            min-height: auto;
        }

        .login-shell {
            max-width: 480px;
            min-height: auto;
            display: flex;
            flex-direction: column;
            border-radius: 22px;
        }

        .login-visual {
            min-height: 270px;
            padding: 24px;
            background-position: center 55%;
        }

        .visual-brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            font-size: 19px;
        }

        .visual-brand-name {
            font-size: 16px;
        }

        .visual-brand-caption {
            font-size: 9px;
        }

        .visual-content {
            margin-top: 45px;
            margin-bottom: 0;
        }

        .visual-content .visual-eyebrow {
            margin-bottom: 12px;
            padding: 7px 11px;
            font-size: 10px;
        }

        .visual-content h2 {
            font-size: 27px;
            margin-bottom: 9px;
        }

        .visual-content p {
            font-size: 12px;
            line-height: 1.7;
        }

        .visual-footer {
            display: none;
        }

        .login-form-panel {
            padding: 32px 25px;
        }

        .login-heading {
            margin-bottom: 25px;
        }

        .login-heading h1 {
            font-size: 27px;
        }

        .login-heading p {
            font-size: 13px;
        }

        .login-input {
            height: 52px;
        }

        .login-submit {
            min-height: 52px;
        }

        .login-bottom-note {
            margin-top: 24px;
        }
    }

    @media (max-width: 360px) {
        .login-form-panel {
            padding: 27px 18px;
        }

        .login-options {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    /* احترام تفضيل تقليل الحركة */
    @media (prefers-reduced-motion: reduce) {
        .login-page *,
        .login-page *::before,
        .login-page *::after {
            transition: none !important;
            animation: none !important;
        }
    }
</style>

<div class="login-page">

    <div class="login-shell">

        {{-- ==========================================
             IMAGE AND WELCOME PANEL
        =========================================== --}}
        <aside class="login-visual">

            <div class="visual-brand">

                <div class="visual-brand-icon">
                    <i class="fas fa-car-side"></i>
                </div>

                <div>
                    <h3 class="visual-brand-name">DriveEase</h3>

                    <span class="visual-brand-caption">
                        Premium Car Rental
                    </span>
                </div>

            </div>

            <div class="visual-content">

                <div class="visual-eyebrow">
                    <span></span>
                    YOUR JOURNEY STARTS HERE
                </div>

                <h2>
                    Drive Your
                    <span>Next</span>
                    Adventure.
                </h2>

                <p>
                    Discover the freedom of the road with a car that
                    matches your journey. Your next destination is
                    closer than you think.
                </p>

            </div>

            <div class="visual-footer">

                <div class="visual-footer-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Reliable & Secure</span>
                </div>

                <div class="visual-footer-item">
                    <i class="fas fa-key"></i>
                    <span>Easy Booking</span>
                </div>

            </div>

        </aside>

        {{-- ==========================================
             LOGIN FORM
        =========================================== --}}
        <main class="login-form-panel">

            <div class="login-heading">

                <span class="heading-label">
                    WELCOME BACK
                </span>

                <h1>{{ __('Login') }}</h1>

                <p>
                    Sign in to your account and get ready for your
                    next journey.
                </p>

            </div>

            @if ($errors->has('email') && !$errors->has('password'))
                <div class="alert alert-danger login-alert" role="alert">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="login-field">

                    <label for="email">
                        {{ __('Email Address') }}
                    </label>

                    <div class="login-input-wrap">

                        <i class="fas fa-envelope login-input-icon"></i>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="login-input @error('email') is-invalid @enderror"
                            placeholder="name@example.com"
                            required
                            autocomplete="email"
                            autofocus
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
                <div class="login-field">

                    <label for="password">
                        {{ __('Password') }}
                    </label>

                    <div class="login-input-wrap">

                        <i class="fas fa-lock login-input-icon"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="login-input @error('password') is-invalid @enderror"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                            dir="ltr"
                        >

                        <button
                            type="button"
                            class="login-toggle-password"
                            id="togglePassword"
                            aria-label="Show password"
                            aria-pressed="false"
                        >
                            <i class="fas fa-eye" id="passwordIcon"></i>
                        </button>

                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                {{-- REMEMBER ME / FORGOT PASSWORD --}}
                <div class="login-options">

                    <label class="login-remember" for="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                            {{ old('remember') ? 'checked' : '' }}
                        >

                        <span>{{ __('Remember Me') }}</span>

                    </label>

                    @if (Route::has('password.request'))

                        <a
                            class="login-forgot"
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Forgot Your Password?') }}
                        </a>

                    @endif

                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="login-submit">

                    <i class="fas fa-sign-in-alt"></i>

                    <span>{{ __('Login') }}</span>

                </button>

            </form>

            <div class="login-security-note">

                <i class="fas fa-shield-alt"></i>

                <span>Your account is protected by secure authentication.</span>

            </div>

            <div class="login-bottom-note">
                Drive safely. Travel comfortably. Enjoy every mile.
            </div>

        </main>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');
        const passwordIcon = document.getElementById('passwordIcon');

        if (passwordInput && toggleButton && passwordIcon) {
            toggleButton.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';

                passwordIcon.classList.toggle('fa-eye', !isPassword);
                passwordIcon.classList.toggle('fa-eye-slash', isPassword);

                toggleButton.setAttribute(
                    'aria-pressed',
                    isPassword ? 'true' : 'false'
                );

                toggleButton.setAttribute(
                    'aria-label',
                    isPassword ? 'Hide password' : 'Show password'
                );
            });
        }
    });
</script>

@endsection

