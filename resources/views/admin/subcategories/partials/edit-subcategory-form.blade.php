<section class="w-full max-w-3xl">
  <form method="post" action="{{ route('admin.subcategories.update', $subcategory->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h5 class="text-xl font-semibold text-gray-900 dark:text-white"> {{ __('Edit Subcategory Details') }} </h5>

    {{-- Name, Category --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div>
        <x-input-label for="name" :value="__('Name')" required="true" />
        <x-text-input id="name" name="name" type="text" :value="old('name', $subcategory->name)" required autofocus
          autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" />

      </div>

      <div>
        <x-input-label for="category_id" :value="__('Category')" required="true" />
        <x-select-input id="category_id" name="category_id" type="text" :options="$categories"
          chooseOptionText="Select a Category" :selectedOption="old('category_id', $subcategory->category_id)" required autocomplete="category_id" />
        <x-input-error :messages="$errors->get('category_id')" />
      </div>
    </div>

    {{-- Photo, Additional Info --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      <div x-data="imageViewer(@js($subcategory->getFirstMediaUrl('subcategory-photos', 'thumb') ?: asset('images/category.png')))">
        <x-input-label for="photo" :value="__('Photo')" required="true" />
        <x-file-input id="photo" name="photo" type="file" accept=".jpg, .jpeg, .png" @change="fileChosen" />
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">
          {{ __('The photo must be in JPG/PNG format (max 1 MB).') }}</div>
        <x-input-error :messages="$errors->get('photo')" />
        <img :src="imageUrl" class="rounded mt-2 w-16 object-cover" alt="subcategory-photo">
      </div>
      <div>
        <x-input-label for="additional_info" :value="__('Additional Info')" />
        <x-textarea-input rows="9" id="additional_info" name="additional_info"
          autocomplete="additional_info">{{ old('additional_info', $subcategory->additional_info) }}</x-textarea-input>
        <x-input-error :messages="$errors->get('additional_info')" />
      </div>
    </div>

    <x-regular-button class="mt-6">{{ __('Save') }}</x-regular-button>
  </form>
</section>
