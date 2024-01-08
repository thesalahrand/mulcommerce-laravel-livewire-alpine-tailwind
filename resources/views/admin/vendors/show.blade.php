<x-admin-app-layout>
  @php
    $breadcrumbItems = [['text' => __('Dashboard'), 'link' => route('admin.dashboard')], ['text' => __('Show Vendors'), 'link' => str()->contains(url()->previous(), route('admin.vendors.index') . '?') ? url()->previous() : route('admin.vendors.index')], ['text' => $vendor->name, 'link' => route('admin.vendors.show', $vendor->id)]];
  @endphp
  <x-slot name="breadcrumb">
    <x-breadcrumb :breadcrumbItems="$breadcrumbItems" />
  </x-slot>

  <div x-data="{ idToDelete: '' }">
    <div x-data="customModalHandler('#confirm-vendor-deletion-modal', false)">
      <x-confirm-deletion-modal htmlId="confirm-vendor-deletion-modal" deleteRouteName="admin.vendors.destroy"
        title="Are you sure you want to remove this vendor?" />

      <div
        class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-end items-center space-x-1 mb-6">
          <x-td-action-button class="cursor-pointer" @click="show, idToDelete = {{ $vendor->id }}"><x-icons.trash
              class="w-5 h-5" /></x-td-action-button>
        </div>
        @include('admin.vendors.partials.show-vendor-details-card')
      </div>
    </div>
  </div>
</x-admin-app-layout>
