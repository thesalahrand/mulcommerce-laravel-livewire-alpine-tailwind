<x-admin-app-layout>
  <x-slot name="header">
    {{ __('Brands') }}
  </x-slot>

  <div class="mt-6">
    <div class="mb-4 flex flex-1 flex-col sm:flex-row space-y-2 sm:space-y-0 justify-between sm:items-center">
      <form method="GET" class="flex items-center w-full sm:w-1/2">
        <label for="voice-search" class="sr-only">Search</label>
        <x-text-input id="search" type="search" name="s" :value="old('search', request('s'))" autofocus
          placeholder="{{ __('Search by brand name, slug, email, phone, website...') }}" autocomplete="search" />
        <x-regular-button class="inline-flex items-center py-[11px] ms-2">
          <x-icons.search class="w-4 h-4 me-2" />
          {{ __('Search') }}
        </x-regular-button>
      </form>
      <a href="{{ route('admin.brands.create') }}">
        <x-regular-button class="inline-flex items-center">
          <x-icons.plus class="w-4 h-4 me-2 -mt-1" />
          {{ __('Add Brand') }}
        </x-regular-button>
      </a>
    </div>

    @include('admin.brands.partials.show-brands-table')
  </div>
</x-admin-app-layout>
