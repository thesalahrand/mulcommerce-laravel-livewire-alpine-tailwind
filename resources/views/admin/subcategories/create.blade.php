<x-admin-app-layout>
  @php
    $breadcrumbItems = [['text' => __('Dashboard'), 'link' => route('admin.dashboard')], ['text' => __('Subcategories'), 'link' => route('admin.subcategories.index')], ['text' => __('Add'), 'link' => route('admin.subcategories.create')]];
  @endphp
  <x-slot name="breadcrumb">
    <x-breadcrumb :breadcrumbItems="$breadcrumbItems" />
  </x-slot>

  <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    @include('admin.subcategories.partials.create-subcategory-form')
  </div>
</x-admin-app-layout>
