@props(['htmlId', 'title', 'deleteRouteName'])

<template x-teleport="body">
  <div id="{{ $htmlId }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[53] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    x-init="isToShowOnPageLoad">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button"
          class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
          @click="hide">
          <x-icons.close class="w-3 h-3" />
          <span class="sr-only">Close modal</span>
        </button>
        <form :action="'{{ route($deleteRouteName, '') }}/' + idToDelete" class="p-4 md:p-5 text-center" method="post">
          @csrf
          @method('DELETE')
          <x-icons.question-mark-circle class="mx-auto mb-4 text-gray-400 w-16 h-16 dark:text-gray-200" />
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
            {{ __($title) }}
          </h3>
          <x-regular-button color="red" class="me-2">{{ __("Yes, I'm sure") }}</x-regular-button>
          <x-regular-button color="light" @click="hide" type="button">{{ __('Cancel') }}</x-regular-button>
        </form>
      </div>
    </div>
  </div>
</template>
