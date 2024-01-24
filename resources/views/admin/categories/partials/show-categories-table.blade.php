<div class="relative overflow-x-auto">
  <table class="w-full mb-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <x-table-th sortBy='id'>{{ __('ID') }}</x-table-th>
        <x-table-th sortBy='name'>{{ __('Name') }}</x-table-th>
        <x-table-th>{{ __('Photo') }}</x-table-th>
        <x-table-th sortBy='is_active'>{{ __('Active') }}</x-table-th>
        <x-table-th sortBy='updated_at'>{{ __('Last Updated') }}</x-table-th>
        <x-table-th>{{ __('Action') }}</x-table-th>
      </tr>
    </thead>
    <tbody>
      @forelse ($categories as $category)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4">
            {{ $category->id }}
          </td>
          <td class="px-6 py-4">
            {{ $category->name }}
          </td>
          <td class="px-6 py-4">
            <img class="w-8 h-8 object-cover"
              src="{{ $category->getFirstMediaUrl('category-photos', 'thumb') ?: asset('images/placeholder-image.png') }}"
              alt="category-photo">
          </td>
          <td class="px-6 py-4">
            {{ $category->is_active ? __('Yes') : __('No') }}
          </td>
          <td class="px-6 py-4">
            {{ $category->updated_at->format('Y-m-d H:i A') }}
          </td>
          <td class="px-6 py-4">
            <div class="flex items-center space-x-1">
              <x-td-action-button href="{{ route('admin.categories.show', $category->id) }}"><x-icons.eye
                  class="w-5 h-5" /></x-td-action-button>
              <x-td-action-button href="{{ route('admin.categories.edit', $category->id) }}"><x-icons.pencil
                  class="w-5 h-5" /></x-td-action-button>
              <x-td-action-button class="cursor-pointer" @click="show, idToDelete = {{ $category->id }}"><x-icons.trash
                  class="w-5 h-5" /></x-td-action-button>
            </div>
          </td>
        </tr>
      @empty
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4 text-center" colspan="6">
            {{ __('No categories to show') }}
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $categories->links() }}
</div>
