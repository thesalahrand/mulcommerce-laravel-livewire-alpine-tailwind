<x-admin-app-layout>
  <x-slot name="header">
    {{ __('Edit Profile') }}
  </x-slot>

  <div class="space-y-6">
    <div
      class="mt-6 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      @include('admin.profile.partials.update-profile-information-form')
    </div>

    {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
      <div class="max-w-xl">
        @include('admin.profile.partials.update-password-form')
      </div>
    </div>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
      <div class="max-w-xl">
        @include('admin.profile.partials.delete-user-form')
      </div>
    </div> --}}
  </div>
  </div>
</x-admin-app-layout>
