<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="custom-register-form">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
            <div class="form-error">{{ $errors->first('name') }}</div>
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username">
            <div class="form-error">{{ $errors->first('email') }}</div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password">
            <div class="form-error">{{ $errors->first('password') }}</div>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password">
            <div class="form-error">{{ $errors->first('password_confirmation') }}</div>
        </div>

        <!-- Already Registered & Submit Button -->
        <div class="form-actions">
            <a href="{{ route('login') }}" class="forgot-password">{{ __('Already registered?') }}</a>
            <button type="submit" class="btn-submit">{{ __('Register') }}</button>
        </div>
    </form>
</x-guest-layout>
