<x-admin-app-layout>
  @php
    $breadcrumbItems = [['text' => __('Dashboard'), 'link' => route('admin.dashboard')], ['text' => __('Brands'), 'link' => str()->contains(url()->previous(), route('admin.brands.index') . '?') ? url()->previous() : route('admin.brands.index')], ['text' => $brand->name, 'link' => route('admin.brands.show', $brand->id)]];
  @endphp
  <x-slot name="breadcrumb">
    <x-breadcrumb :breadcrumbItems="$breadcrumbItems" />
  </x-slot>

  <div x-data="{ idToDelete: '' }">
    <div x-data="customModalHandler('#confirm-brand-deletion-modal', false)">
      <x-confirm-deletion-modal htmlId="confirm-brand-deletion-modal" deleteRouteName="admin.brands.destroy"
        title="Are you sure you want to remove this brand?" />

      <div
        class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-end items-center space-x-1 mb-6">
          <a class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            href="{{ route('admin.brands.edit', $brand->id) }}"><x-icons.pencil class="w-5 h-5" /></a>
          <a class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer"
            @click="show, idToDelete = {{ $brand->id }}"><x-icons.trash class="w-5 h-5" /></a>
        </div>
        @include('admin.brands.partials.show-brand-details-card')
      </div>
    </div>
  </div>
</x-admin-app-layout>
