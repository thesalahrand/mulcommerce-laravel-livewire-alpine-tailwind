<x-guest-layout>
  <!-- Email/Username -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> Sign in to our platform </h5>

    <!-- Session Status -->

    <div class="mt-6">
      <x-input-label for="email_username" :value="__('Email/Username')" />
      <x-text-input id="email_username" type="text" name="email_username" :value="old('email_username')" required autofocus
        autocomplete="email-username" />
      <x-input-error :messages="$errors->get('email_username')" />
    </div>

    <!-- Password -->
    <div class="mt-6">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" />
    </div>

    <!-- Remember Me -->
    <div class="flex items-start mt-6">
      <div class="flex items-start">
        <div class="flex items-center h-5">
          <x-checkbox-input id="remember" name="remember" />
        </div>
        <x-input-label for="remember" :value="__('Remember me')" class="ms-2 mb-0" />
      </div>
    </div>

    <x-regular-button color='blue' class="w-full mt-6">
      {{ __('Log in') }}
    </x-regular-button>

    <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-6"> Not registered? <a
        class="text-blue-700 hover:underline dark:text-blue-500" href="{{ route('register') }}">Create
        account</a></div>

    {{-- <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
      @endif
    </div> --}}
  </form>
</x-guest-layout>
