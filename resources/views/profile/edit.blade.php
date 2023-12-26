<x-app-layout>
  @php
    $breadcrumbItems = [['text' => __('Home'), 'link' => route('home')], ['text' => __('Edit Profile'), 'link' => route('profile.edit')]];
  @endphp
  <x-breadcrumb :breadcrumbItems="$breadcrumbItems" />

  <div class="max-w-screen-xl mx-auto px-4 py-6 space-y-6">
    <div
      class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      @include('profile.partials.update-profile-information-form')
    </div>

    <div
      class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      @include('profile.partials.update-password-form')
    </div>

    <div
      class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      @include('profile.partials.delete-user-form')
    </div>
  </div>
</x-app-layout>
