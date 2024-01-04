<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
  aria-label="Sidebar">
  <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
    <ul class="font-medium">
      <li>
        <a href="{{ route('admin.dashboard') }}"
          class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          {{ __('Dashboard') }}
        </a>
      </li>
      <li>
        <button type="button"
          class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-brand" data-collapse-toggle="dropdown-brand">
          <span class="flex-1 text-left rtl:text-right whitespace-nowrap">{{ __('Brands') }}</span>
          <x-icons.arrow-down class="w-3 h-3" />
        </button>
        <ul id="dropdown-brand" class="{{ strpos(request()->route()->getName(),'admin.brands') !== 0? 'hidden': '' }}">
          <li>
            <a href="{{ route('admin.brands.index') }}"
              class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-6 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
              <x-icons.arrow-right class="w-3 me-2" />
              {{ __('Show Brands') }}
            </a>
          </li>
          <li>
            <a href="{{ route('admin.brands.create') }}"
              class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-6 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
              <x-icons.arrow-right class="w-3 me-2" />
              {{ __('Add Brand') }}
            </a>
          </li>
        </ul>
      </li>
      <li>
        <button type="button"
          class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-category" data-collapse-toggle="dropdown-category">
          <span class="flex-1 text-left rtl:text-right whitespace-nowrap">{{ __('Categories') }}</span>
          <x-icons.arrow-down class="w-3 h-3" />
        </button>
        <ul id="dropdown-category"
          class="{{ strpos(request()->route()->getName(),'admin.categories') !== 0? 'hidden': '' }}">
          <li>
            <a href="{{ route('admin.categories.index') }}"
              class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-6 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
              <x-icons.arrow-right class="w-3 me-2" />
              {{ __('Show Categories') }}
            </a>
          </li>
          <li>
            <a href="{{ route('admin.categories.create') }}"
              class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-6 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
              <x-icons.arrow-right class="w-3 me-2" />
              {{ __('Add Category') }}
            </a>
          </li>
        </ul>
      </li>
      <li>
        <button type="button"
          class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-subcategory" data-collapse-toggle="dropdown-subcategory">
          <span class="flex-1 text-left rtl:text-right whitespace-nowrap">{{ __('Subcategories') }}</span>
          <x-icons.arrow-down class="w-3 h-3" />
        </button>
        <ul id="dropdown-subcategory"
          class="{{ strpos(request()->route()->getName(),'admin.subcategories') !== 0? 'hidden': '' }}">
          <li>
            <a href="{{ route('admin.subcategories.index') }}"
              class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-6 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
              <x-icons.arrow-right class="w-3 me-2" />
              {{ __('Show Subcategories') }}
            </a>
          </li>
          <li>
            <a href="{{ route('admin.subcategories.create') }}"
              class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-6 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
              <x-icons.arrow-right class="w-3 me-2" />
              {{ __('Add Subcategory') }}
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>
