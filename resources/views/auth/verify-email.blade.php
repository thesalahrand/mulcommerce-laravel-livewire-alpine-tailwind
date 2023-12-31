<x-guest-layout>
  <div class="space-y-6">
    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> {{ __('Complete Email Verification') }} </h5>

    <div class="text-sm text-gray-500 dark:text-gray-400">
      {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
      <x-auth-session-status class="mb-4"
        status="{{ __('A new verification link has been sent to the email address you provided during registration.') }}" />
    @endif

    <div class="flex items-center justify-between">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
          <x-regular-button>
            {{ __('Resend Verification Email') }}
          </x-regular-button>
        </div>
      </form>

      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit"
          class="underline text-sm text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
          {{ __('Log Out') }}
        </button>
      </form>
    </div>
  </div>
</x-guest-layout>
