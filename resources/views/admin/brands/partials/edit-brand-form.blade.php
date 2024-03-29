<section class="w-full max-w-3xl">
  <form method="post" action="{{ route('admin.brands.update', $brand->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> {{ __('Edit Brand Details') }} </h5>

    {{-- Name, Founded In --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div>
        <x-input-label for="name" :value="__('Name')" required="true" />
        <x-text-input id="name" name="name" type="text" :value="old('name', $brand->name)" required autofocus
          autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" />
      </div>
      <div>
        <x-input-label for="founded_in" :value="__('Founded In')" />
        <x-text-input id="founded_in" name="founded_in" type="date" max="{{ now()->format('Y-m-d') }}"
          :value="old('founded_in', $brand->founded_in)" />
        <x-input-error :messages="$errors->get('founded_in')" />
      </div>
    </div>

    {{-- Email, Phone --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" :value="old('email', $brand->email)" autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" />
      </div>
      <div>
        <x-input-label for="phone" :value="__('Phone')" />
        <x-text-input id="phone" name="phone" type="tel" :value="old('phone', $brand->phone)" autocomplete="phone" />
        <x-input-error :messages="$errors->get('phone')" />
      </div>
    </div>

    {{-- Website, Country of Origin --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div>
        <x-input-label for="website" :value="__('Website')" />
        <x-text-input id="website" name="website" type="url" :value="old('website', $brand->website)" autocomplete="website" />
        <x-input-error :messages="$errors->get('website')" />
      </div>
      <div>
        <x-input-label for="country_of_origin" :value="__('Country of Origin')" />
        <x-text-input id="country_of_origin" name="country_of_origin" type="text" :value="old('country_of_origin', $brand->country_of_origin)"
          autocomplete="country_of_origin" />
        <x-input-error :messages="$errors->get('country_of_origin')" />
      </div>
    </div>

    {{-- Logo, Additional Info --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div x-data="imageViewer(@js($brand->getFirstMediaUrl('brand-logos', 'thumb') ?: asset('images/placeholder-image.png')))">
        <x-input-label for="logo" :value="__('Logo')" required="true" />
        <x-file-input id="logo" name="logo" type="file" accept=".jpg, .jpeg, .png" @change="fileChosen" />
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">
          {{ __('Your logo must be in JPG/PNG format (max 1 MB).') }}</div>
        <x-input-error :messages="$errors->get('logo')" />
        <img :src="imageUrl" class="rounded mt-2 w-16 object-cover" alt="brand-photo">
      </div>
      <div>
        <x-input-label for="additional_info" :value="__('Additional Info')" />
        <x-textarea-input rows="9" id="additional_info" name="additional_info"
          autocomplete="additional_info">{{ old('additional_info', $brand->additional_info) }}</x-textarea-input>
        <x-input-error :messages="$errors->get('additional_info')" />
      </div>
    </div>

    <!-- Active -->
    <div class="flex items-start mt-6">
      <div class="flex items-start">
        <div class="flex items-center h-5">
          <x-checkbox-input id="is_active" name="is_active" :checked="$brand->is_active" />
        </div>
        <x-input-label for="is_active" :value="__('Active')" class="ms-2 mb-0" />
      </div>
    </div>

    <x-regular-button class="mt-6">{{ __('Save') }}</x-regular-button>
  </form>
</section>
