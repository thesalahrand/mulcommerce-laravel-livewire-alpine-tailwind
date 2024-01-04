<div class="relative overflow-x-auto">
  <table class="w-full mb-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <x-table-th sortBy='id'>{{ __('ID') }}</x-table-th>
        <x-table-th sortBy='name'>{{ __('Name') }}</x-table-th>
        <x-table-th sortBy='categories.name'>{{ __('Category') }}</x-table-th>
        <x-table-th>{{ __('Photo') }}</x-table-th>
        <x-table-th sortBy='is_active'>{{ __('Active') }}</x-table-th>
        <x-table-th sortBy='updated_at'>{{ __('Last Updated') }}</x-table-th>
        <x-table-th>{{ __('Action') }}</x-table-th>
      </tr>
    </thead>
    <tbody>
      @forelse ($subcategories as $subcategory)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4">
            {{ $subcategory->id }}
          </td>
          <td class="px-6 py-4">
            {{ $subcategory->name }}
          </td>
          <td class="px-6 py-4">
            <a class="text-blue-500 dark:text-blue-400 cursor-pointer"
              href="{{ route('admin.categories.show', $subcategory->category->id) }}">
              {{ $subcategory->category->name }}
            </a>
          </td>
          <td class="px-6 py-4">
            <img class="w-8 h-8 object-cover"
              src="{{ $subcategory->getFirstMediaUrl('subcategory-photos', 'thumb') ?: asset('images/category.png') }}"
              alt="subcategory-photo">
          </td>
          <td class="px-6 py-4">
            {{ $subcategory->is_active ? __('Yes') : __('No') }}
          </td>
          <td class="px-6 py-4">
            {{ $subcategory->updated_at->format('Y-m-d H:i A') }}
          </td>
          <td class="px-6 py-4">
            <div class="flex items-center space-x-1">
              <a class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                href="{{ route('admin.subcategories.show', $subcategory->id) }}"><x-icons.eye class="w-5 h-5" /></a>
              <a class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                href="{{ route('admin.subcategories.edit', $subcategory->id) }}"><x-icons.pencil class="w-5 h-5" /></a>
              <a class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer"
                @click="show, idToDelete = {{ $subcategory->id }}"><x-icons.trash class="w-5 h-5" /></a>
            </div>
          </td>
        </tr>
      @empty
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4 text-center" colspan="6">
            {{ __('No subcategories to show') }}
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $subcategories->links() }}
</div>
