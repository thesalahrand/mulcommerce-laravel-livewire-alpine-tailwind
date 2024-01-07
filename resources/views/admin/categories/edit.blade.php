<x-admin-app-layout>
  @php
    $breadcrumbItems = [['text' => __('Dashboard'), 'link' => route('admin.dashboard')], ['text' => __('Categories'), 'link' => str()->contains(url()->previous(), route('admin.categories.index') . '?') ? url()->previous() : route('admin.categories.index')], ['text' => $category->name, 'link' => route('admin.categories.edit', $category->id)]];
  @endphp
  <x-slot name="breadcrumb">
    <x-breadcrumb :breadcrumbItems="$breadcrumbItems" />
  </x-slot>

  <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    @include('admin.categories.partials.edit-category-form')
  </div>
</x-admin-app-layout>
