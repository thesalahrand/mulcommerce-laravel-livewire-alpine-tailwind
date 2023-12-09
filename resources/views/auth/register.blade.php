<x-guest-layout>
  <form method="POST" action="{{ route('register') }}">
    @csrf

    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> Sign up to our platform </h5>

    <!-- Name -->
    <div class="mt-6">
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" />
    </div>

    <div class="flex justify-between">
      <!-- Email Address -->
      <div class="mt-6 w-[48%]">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" />
      </div>

      <!-- Username -->
      <div class="mt-6 w-[48%]">
        <x-input-label for="username" :value="__('Username')" />
        <x-text-input id="username" type="text" name="username" :value="old('username')" required
          autocomplete="username" />
        <x-input-error :messages="$errors->get('username')" />
      </div>

    </div>

    <div class="flex justify-between">
      <!-- Password -->
      <div class="mt-6 w-[48%]">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-6 w-[48%]">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
          autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
    </div>

    <x-regular-button color='blue' class="w-full mt-6">
      {{ __('Register') }}
    </x-regular-button>

    <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-6">Already registered? <a
        class="text-blue-700 hover:underline dark:text-blue-500" href="{{ route('login') }}">Login now</a></div>
  </form>
</x-guest-layout>
