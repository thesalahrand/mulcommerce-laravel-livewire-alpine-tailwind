<section class="w-full max-w-3xl">
  <div class="space-y-4 text-sm">
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Name') }}</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $vendor->name }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Email') }}</h6>
      @if ($vendor->email)
        <a class="text-blue-500 dark:text-blue-400 cursor-pointer" href="mailto:{{ $vendor->email }}">{{ $vendor->email }}
        </a>
      @else
        <p class="text-gray-500 dark:text-gray-400">N/R</p>
      @endif
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Username') }}</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $vendor->username }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Photo') }}</h6>
      <img src="{{ $vendor->getFirstMediaUrl('profile-photos', 'thumb') }}" class="rounded mt-2 w-16 object-cover"
        alt="vendor-photo">
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Phone') }}</h6>
      @if ($vendor->phone)
        <a class="text-blue-500 dark:text-blue-400 cursor-pointer"
          href="tel:{{ $vendor->phone }}">{{ $vendor->phone }}
        </a>
      @else
        <p class="text-gray-500 dark:text-gray-400">N/R</p>
      @endif
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Address') }}</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $vendor->address ?? 'N/R' }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Founded In') }}</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $vendor->vendorDetails->founded_in ?? 'N/R' }}</p>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Active') }}</h6>
      <div class="flex items-center space-x-1 text-gray-500 dark:text-gray-400">
        <span>{{ $vendor->is_active ? __('Yes') : __('No') }}</span>
        @include('admin.vendors.partials.toggle-vendor-status-form')
      </div>
    </div>
    <div class="grid grid-cols-2 gap-x-2">
      <h6 class="text-gray-700  dark:text-gray-400 font-semibold">{{ __('Additional Info') }}</h6>
      <p class="text-gray-500 dark:text-gray-400">{{ $vendor->vendorDetails->additional_info ?? 'N/R' }}</p>
    </div>
  </div>
</section>
