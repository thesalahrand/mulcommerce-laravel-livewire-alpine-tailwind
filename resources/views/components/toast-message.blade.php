@if (session()->has('flash.toast-message'))
  <div id="toast-message"
    class="fixed top-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 z-[51]"
    role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
    @if (session('flash.toast-message.type') == 'success')
      <div
        class ="inline-flex items-center
    justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <x-icons.check class="w-5 h-5" />
        <span class="sr-only">Check icon</span>
      </div>
    @endif
    <div class="ms-3 text-sm font-normal">{{ session('flash.toast-message.message') }}</div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
      data-dismiss-target="#toast-message" aria-label="Close">
      <span class="sr-only">Close</span>
      <x-icons.close class="h-3 w-3" />
    </button>
  </div>
@endif
