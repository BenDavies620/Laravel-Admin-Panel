@extends('layouts.app')

@section('content')

<div class="login-page">

    <div class="login-page__card">

        <!-- Login heading -->
        <div class="login-page__header">

            <div class="login-page__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    <path d="M12 15v3"/>
                </svg>
            </div>

            <h1 class="login-page__title">
                Welcome back
            </h1>

            <p class="login-page__description">
                Sign in to access your admin workspace.
            </p>
        </div>

        <!-- Login form -->
        <form method="POST"
              action="{{ route('login') }}"
              class="login-page__form">

            @csrf

            <!-- Email -->
            <div class="login-page__field">

                <label for="email" class="login-page__label">
                    Email Address
                </label>

                <input id="email"
                       type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus>

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password -->
            <div class="login-page__field">

                <label for="password" class="login-page__label">
                    Password
                </label>

                <input id="password"
                       type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password"
                       required
                       autocomplete="current-password">

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Remember me and password reset -->
            <div class="login-page__options">

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember"
                           @checked(old('remember'))>

                    <label class="form-check-label"
                           for="remember">
                        Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="login-page__forgot">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="btn btn-primary login-page__submit">
                Sign in
            </button>
        </form>
    </div>
</div>

@endsection