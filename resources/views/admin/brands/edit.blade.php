<x-admin-app-layout>
  @php
    $breadcrumbItems = [['text' => __('Dashboard'), 'link' => route('admin.dashboard')], ['text' => __('Brands'), 'link' => url()->previous() != url()->current() && strpos(url()->previous(), route('admin.brands.index')) !== false ? url()->previous() : route('admin.brands.index')], ['text' => __('Edit'), 'link' => route('admin.brands.edit', $brand->id)]];
  @endphp
  <x-slot name="breadcrumb">
    <x-breadcrumb :breadcrumbItems="$breadcrumbItems" />
  </x-slot>

  <div
    class="mt-4 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    @include('admin.brands.partials.edit-brand-form')
  </div>
</x-admin-app-layout>