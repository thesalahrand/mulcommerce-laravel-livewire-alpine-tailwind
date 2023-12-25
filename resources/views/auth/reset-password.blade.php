<x-guest-layout>
  <form method="POST" action="{{ route('password.store') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> {{ __('Reset Password') }} </h5>

    <!-- Email Address -->
    <div class="mt-6">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus
        autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" />
    </div>

    <!-- Password -->
    <div class="mt-6">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password')" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-6">
      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
      <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
        autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password_confirmation')" />
    </div>

    <x-regular-button class="mt-6">
      {{ __('Reset Password') }}
    </x-regular-button>
  </form>
</x-guest-layout>
