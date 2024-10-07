<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="custom-login-form">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
            <div class="form-error">
                @foreach ($errors->get('email') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password">
            <div class="form-error">
                @foreach ($errors->get('password') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>

        <!-- Remember Me -->
        <div class="form-group remember-me">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me" class="form-label">{{ __('Remember me') }}</label>
        </div>

        <!-- Forgot Password & Submit Button -->
        <div class="form-actions">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">{{ __('Forgot your password?') }}</a>
            @endif
            <button type="submit" class="btn-submit">{{ __('Log in') }}</button>
        </div>
    </form>
</x-guest-layout>
