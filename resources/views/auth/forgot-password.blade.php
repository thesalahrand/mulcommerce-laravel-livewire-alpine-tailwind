<x-guest-layout>
  <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
  </div>

  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
      <x-input-error :messages="$errors->get('email')" />
    </div>

    <x-regular-button class="mt-6">
      {{ __('Email Password Reset Link') }}
    </x-regular-button>
  </form>
</x-guest-layout>
