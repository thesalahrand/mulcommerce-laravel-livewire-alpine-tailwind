<div {{ $attributes }}>
  <button data-dropdown-toggle="localization-dropdown"
    class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
    {{ config('app.available_locales')[app()->getLocale()] }}
    <x-icons.arrow-down class="w-2.5 h-2.5 ms-2.5" />
  </button>
  <div id="localization-dropdown"
    class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
      @foreach (config('app.available_locales') as $key => $value)
        <li>
          <a href="/locales/{{ $key }}"
            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $value }}</a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
