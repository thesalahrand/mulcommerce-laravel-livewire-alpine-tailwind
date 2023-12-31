<div class="relative overflow-x-auto">
  <table class="w-full mb-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <x-table-th sortBy='id'>ID</x-table-th>
        <x-table-th sortBy='name'>Name</x-table-th>
        <x-table-th>Logo</x-table-th>
        <x-table-th sortBy='is_active'>Active</x-table-th>
        <x-table-th sortBy='updated_at'>Last Updated</x-table-th>
        <x-table-th>Action</x-table-th>
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
          <td class="px-6 py-4">
            {{ $brand->updated_at->format('Y-m-d H:i A') }}
          </td>
          <td class="px-6 py-4 flex">
            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">Delete</a>
          </td>
        </tr>
      @empty
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4 text-center" colspan="6">
            {{ __('No brands to show') }}
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $brands->links() }}
</div>
