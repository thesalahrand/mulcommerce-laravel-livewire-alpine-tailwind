<x-admin-app-layout>
  @php
    $breadcrumbItems = [['text' => __('Dashboard'), 'link' => route('admin.dashboard')], ['text' => __('Subcategories'), 'link' => route('admin.subcategories.index')]];
  @endphp
  <x-slot name="breadcrumb">
    <x-breadcrumb :breadcrumbItems="$breadcrumbItems" />
  </x-slot>

  <div x-data="{ idToDelete: '' }">
    <div x-data="customModalHandler('#confirm-subcategory-deletion-modal', false)">
      <x-confirm-deletion-modal htmlId="confirm-subcategory-deletion-modal" deleteRouteName="admin.subcategories.destroy"
        title="Are you sure you want to remove this subcategory?" />

      <div class="mb-4 flex flex-1 flex-col sm:flex-row space-y-2 sm:space-y-0 justify-between sm:items-center">
        <form method="GET" class="flex items-center w-full sm:w-1/2">
          <label for="search" class="sr-only">{{ __('Search') }}</label>
          <x-text-input id="search" type="search" name="s" :value="old('search', request('s'))" autofocus
            placeholder="{{ __('Search by subcategory ID, name, and slug') }}" autocomplete="search" />
          <x-regular-button class="inline-flex items-center py-[11px] ms-2">
            <x-icons.search class="w-4 h-4 me-2" />
            {{ __('Search') }}
          </x-regular-button>
        </form>
        <a href="{{ route('admin.subcategories.create') }}">
          <x-regular-button class="inline-flex items-center">
            <x-icons.plus class="w-4 h-4 me-2 -mt-1" />
            {{ __('Add Subcategory') }}
          </x-regular-button>
        </a>
      </div>

      @include('admin.subcategories.partials.show-subcategories-table')
    </div>
  </div>
</x-admin-app-layout>
