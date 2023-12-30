<div class="relative overflow-x-auto">
  <div class="pb-4 bg-white dark:bg-gray-900">
    <label for="table-search" class="sr-only">Search</label>
    <div class="relative mt-1">
      <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </div>
      <input type="text" id="table-search"
        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Search for items">
    </div>
  </div>
  <table class="w-full mb-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          ID
        </th>
        <th scope="col" class="px-6 py-3">
          Name
        </th>
        <th scope="col" class="px-6 py-3">
          Logo
        </th>
        <th scope="col" class="px-6 py-3">
          Active
        </th>
        <th scope="col" class="px-6 py-3">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($brands as $brand)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4">
            {{ $brand->id }}
          </td>
          <td class="px-6 py-4">
            {{ $brand->name }}
          </td>
          <td class="px-6 py-4">
            <img class="w-8" src="{{ $brand->logo }}" alt="">
            {{-- <img src="{{ strpos($brand->logo, 'https') != 0 ?  : $brand->logo }}" alt=""> --}}
          </td>
          <td class="px-6 py-4 font-semibold">
            {{ $brand->active ? 'YES' : 'NO' }}
          </td>
          <td class="px-6 py-4 flex">
            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">Delete</a>
          </td>
        </tr>
      @empty
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4 text-center" colspan="5">
            {{ __('No brands to show') }}
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $brands->links() }}
</div>
