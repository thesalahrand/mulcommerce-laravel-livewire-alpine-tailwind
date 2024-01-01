<section class="w-full max-w-3xl">
  {{-- <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
          {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
          {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
      </header> --}}

  <form method="post" action="{{ route('password.update') }}" @submit="storeCurrScrollPosition">
    @csrf
    @method('put')

    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
      {{ __('Update Password') }}
    </h2>

    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
      {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>

    <div class="mt-6">
      <x-input-label for="update_password_current_password" :value="__('Current Password')" required="true" />
      <x-text-input id="update_password_current_password" name="current_password" type="password"
        autocomplete="current-password" required />
      <x-input-error :messages="$errors->updatePassword->get('current_password')" />
    </div>

    <div class="mt-6">
      <x-input-label for="update_password_password" :value="__('New Password')" required="true" />
      <x-text-input id="update_password_password" name="password" type="password" autocomplete="new-password"
        required />
      <x-input-error :messages="$errors->updatePassword->get('password')" />
    </div>

    <div class="mt-6">
      <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" required="true" />
      <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
        autocomplete="new-password" required />
      <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
    </div>

    <x-regular-button class="mt-6">{{ __('Save') }}</x-regular-button>

    {{--
        <div class="flex items-center gap-4">
          <x-regular-button>{{ __('Save') }}</x-regular-button>

          @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
              class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
          @endif
        </div> --}}
  </form>
</section>
