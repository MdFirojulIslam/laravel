<x-guest-layout>
    <div class="password-reset-info">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="session-status" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="custom-reset-form">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus />
            <div class="form-error">{{ $errors->first('email') }}</div>
        </div>

        <!-- Submit Button -->
        <div class="form-actions">
            <button type="submit" class="btn-submit">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>
