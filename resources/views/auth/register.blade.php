<x-guest-layout>
  <form method="POST" action="{{ route('register') }}" x-data="{ role: @js(old('user') ?? 'user') }" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> {{ __('Sign up to our platform') }} </h5>

    <!-- Role -->
    <div class="mt-6">
      <div class="flex items-center">
        <x-input-label :value="__('Role')" class="flex-1 mb-[0px]" required="true" />

        <div class="flex justify-between flex-1">
          <div class="flex items-center">
            <x-radio-input name="role" id="role_user" value="user" checked="true" x-model="role" required />
            <x-input-label for="role_user" class="mb-[0px] ms-2" :value="__('User')" />
          </div>
          <div class="flex items-center">
            <x-radio-input name="role" id="role_vendor" value="vendor" x-model="role" required />
            <x-input-label for="role_vendor" class="mb-[0px] ms-2" :value="__('Vendor')" />
          </div>
        </div>
      </div>
      <x-input-error :messages="$errors->get('role')" />
    </div>

    <!-- Name -->
    <div class="mt-6">
      <x-input-label for="name" :value="__('Name')" required="true" />
      <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
        autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" />
    </div>

    <!-- Email, Username -->
    <div class="grid grid-cols-2 gap-x-4 mt-6">
      <div>
        <x-input-label for="email" :value="__('Email')" required="true" />
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" />
      </div>
      <div>
        <x-input-label for="username" :value="__('Username')" required="true" />
        <x-text-input id="username" type="text" name="username" :value="old('username')" minlength="3" maxlength="12"
          required autocomplete="username" />
        <x-input-error :messages="$errors->get('username')" />
      </div>
    </div>

    <!-- Phone, Address -->
    <div class="grid grid-cols-2 gap-x-4 mt-6" x-show="role === 'vendor'">
      <div>
        <x-input-label for="phone" :value="__('Phone')" required="true" />
        <x-text-input id="phone" type="tel" name="phone" :value="old('phone')"
          x-bind:required="role === 'vendor' ? true : false" autocomplete="phone" />
        <x-input-error :messages="$errors->get('phone')" />
      </div>
      <div>
        <x-input-label for="address" :value="__('Address')" required="true" />
        <x-text-input id="address" type="text" name="address" :value="old('address')"
          x-bind:required="role === 'vendor' ? true : false" autocomplete="address" />
        <x-input-error :messages="$errors->get('address')" />
      </div>
    </div>

    <!-- Photo, Address -->
    <div class="mt-6" x-data="imageViewer(@js(asset('images/default-image.png')))" x-show="role === 'vendor'">
      <x-input-label for="photo" :value="__('Photo')" required="true" />
      <x-file-input id="photo" name="photo" type="file" accept=".jpg, .jpeg" @change="fileChosen"
        x-bind:required="role === 'vendor' ? true : false" />
      <div class="mt-1 text-sm text-gray-500 dark:text-gray-300">
        {{ __('Your photo must be in JPG format (max 1 MB).') }}</div>
      <x-input-error :messages="$errors->get('photo')" />
      <img :src="imageUrl" class="rounded mt-2 w-32 object-cover" alt="no-photo">
    </div>

    <!-- Password, Password Confirmation -->
    <div class="grid grid-cols-2 gap-x-4 mt-6">
      <div>
        <x-input-label for="password" :value="__('Password')" required="true" />
        <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" />
      </div>
      <div>
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" required="true" />
        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
          autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
    </div>

    <x-regular-button class="w-full mt-6">
      {{ __('Register') }}
    </x-regular-button>

    <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-6">{{ __('Already registered') }}? <a
        class="text-blue-700 hover:underline dark:text-blue-500" href="{{ route('login') }}">{{ __('Login now') }}</a>
    </div>
  </form>
</x-guest-layout>
