<section class="w-full max-w-3xl">
  <form method="post" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> {{ __('Edit Category Details') }} </h5>

    {{-- Name --}}
    <div class="mt-6">
      <x-input-label for="name" :value="__('Name')" required="true" />
      <x-text-input id="name" name="name" type="text" :value="old('name', $category->name)" required autofocus
        autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" />
    </div>

    {{-- Photo, Additional Info --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div x-data="imageViewer(@js($category->getFirstMediaUrl('category-photos', 'thumb') ?: asset('images/placeholder-image.png')))">
        <x-input-label for="photo" :value="__('Photo')" required="true" />
        <x-file-input id="photo" name="photo" type="file" accept=".jpg, .jpeg, .png" @change="fileChosen" />
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">
          {{ __('The photo must be in JPG/PNG format (max 1 MB).') }}</div>
        <x-input-error :messages="$errors->get('photo')" />
        <img :src="imageUrl" class="rounded mt-2 w-16 object-cover" alt="category-photo">
      </div>
      <div>
        <x-input-label for="additional_info" :value="__('Additional Info')" />
        <x-textarea-input rows="9" id="additional_info" name="additional_info"
          autocomplete="additional_info">{{ old('additional_info', $category->additional_info) }}</x-textarea-input>
        <x-input-error :messages="$errors->get('additional_info')" />
      </div>
    </div>

    <!-- Active -->
    <div class="flex items-start mt-6">
      <div class="flex items-start">
        <div class="flex items-center h-5">
          <x-checkbox-input id="is_active" name="is_active" :checked="$category->is_active" />
        </div>
        <x-input-label for="is_active" :value="__('Active')" class="ms-2 mb-0" />
      </div>
    </div>

    <x-regular-button class="mt-6">{{ __('Save') }}</x-regular-button>
  </form>
</section>
