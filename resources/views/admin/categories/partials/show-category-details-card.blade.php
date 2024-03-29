<section class="w-full max-w-3xl">
  <div class="space-y-4 text-sm">
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Name') }}</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $category->name }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Photo') }}</h6>
      <img src="{{ $category->getFirstMediaUrl('category-photos', 'thumb') ?: asset('images/placeholder-image.png') }}"
        class="rounded mt-2 w-16 object-cover" alt="category-photo">
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Active') }}</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $category->is_active ? __('Yes') : __('No') }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Additional Info') }}</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $category->additional_info ?? 'N/R' }}</p>
    </div>
  </div>
</section>
