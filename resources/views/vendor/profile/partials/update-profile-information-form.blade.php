<section class="w-full max-w-3xl">
  {{-- <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      {{ __("Update your account's profile information and email address.") }}
    </p>
  </header> --}}

  {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form> --}}

  <form method="post" action="{{ route('vendor.profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> {{ __('Profile Information') }} </h5>

    {{-- Name, Email --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus
          autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" />
      </div>
      <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" />

        {{-- @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
              <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                {{ __('Your email address is unverified.') }}

                <button form="send-verification"
                  class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                  {{ __('Click here to re-send the verification email.') }}
                </button>
              </p>

              @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                  {{ __('A new verification link has been sent to your email address.') }}
                </p>
              @endif
            </div>
          @endif --}}
      </div>
    </div>

    {{-- Username, Phone --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div>
        <x-input-label for="username" :value="__('Username')" />
        <x-text-input id="username" name="username" type="text" :value="old('username', $user->username)" minlength="3" maxlength="12"
          required autocomplete="username" />
        <x-input-error :messages="$errors->get('username')" />
      </div>
      <div>
        <x-input-label for="phone" :value="__('Phone')" />
        <x-text-input id="phone" name="phone" type="tel" :value="old('phone', $user->phone)" autocomplete="phone" />
        <x-input-error :messages="$errors->get('phone')" />
      </div>
    </div>

    {{-- Founded In, Address --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div>
        <x-input-label for="founded_in" :value="__('Founded In')" />
        <x-text-input id="founded_in" name="founded_in" type="date" max="{{ now()->format('Y-m-d') }}"
          :value="old('founded_in', $user->vendorDetails->founded_in)" />
        <x-input-error :messages="$errors->get('founded_in')" />
      </div>
      <div>
        <x-input-label for="address" :value="__('Address')" />
        <x-text-input id="address" name="address" type="text" :value="old('address', $user->address)" autocomplete="address" />
        <x-input-error :messages="$errors->get('address')" />
      </div>
    </div>

    {{-- Photo, Additional Info --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div x-data="imageViewer(@js($user->photo ? asset("storage/{$user->photo}") : asset('storage/no-user.png')))">
        <x-input-label for="photo" :value="__('Photo')" />
        <x-file-input id="photo" name="photo" type="file" accept=".jpg, .jpeg" @change="fileChosen" />
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">
          {{ __('Your photo must be in JPG format (max 1 MB).') }}</div>
        <x-input-error :messages="$errors->get('photo')" />
        <img :src="imageUrl" class="rounded mt-2 w-32 h-32 object-cover" alt="user-photo">
      </div>
      <div>
        <x-input-label for="additional_info" :value="__('Additional Info')" />
        <x-textarea-input rows="9" id="additional_info" name="additional_info"
          autocomplete="additional_info">{{ old('additional_info', $user->vendorDetails->additional_info) }}</x-textarea-input>
        <x-input-error :messages="$errors->get('additional_info')" />
      </div>
    </div>

    <x-regular-button class="mt-6">{{ __('Save') }}</x-regular-button>

    {{-- @if (session('status') === 'profile-updated')
      <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
    @endif --}}
    {{-- <div class="flex items-center gap-4">

    </div> --}}
  </form>
</section>
