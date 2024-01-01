<section class="w-full max-w-3xl">
  <div class="space-y-2 text-sm">
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Name</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $brand->name }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Slug</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $brand->slug }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Logo</h6>
      <img src="{{ $brand->getFirstMediaUrl('brand-logos', 'thumb') ?: asset('images/brand.png') }}"
        class="rounded mt-2 w-16 object-cover" alt="brand-photo">
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Email</h6>
      @if ($brand->email)
        <a class="text-blue-500 dark:text-blue-400 cursor-pointer" href="mailto:{{ $brand->email }}">{{ $brand->email }}
        </a>
      @else
        <p class="text-gray-500 dark:text-gray-400">N/R</p>
      @endif
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Phone</h6>
      @if ($brand->phone)
        <a class="text-blue-500 dark:text-blue-400 cursor-pointer" href="tel:{{ $brand->phone }}">{{ $brand->phone }}
        </a>
      @else
        <p class="text-gray-500 dark:text-gray-400">N/R</p>
      @endif
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Website</h6>
      @if ($brand->phone)
        <a class="text-blue-500 dark:text-blue-400 cursor-pointer" target="_blank" href="{{ $brand->website }}">
          {{ $brand->website }}
        </a>
      @else
        <p class="text-gray-500 dark:text-gray-400">N/R</p>
      @endif
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Country of Origin</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $brand->country_of_origin ?? 'N/R' }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Founded In</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $brand->founded_in ?? 'N/R' }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Active</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $brand->is_active ? 'Yes' : 'No' }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">Additional Info</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $brand->additional_info ?? 'N/R' }}</p>
    </div>
  </div>
</section>
