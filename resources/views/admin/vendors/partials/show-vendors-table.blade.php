<div class="relative overflow-x-auto">
  <table class="w-full mb-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <x-table-th sortBy='id'>{{ __('ID') }}</x-table-th>
        <x-table-th sortBy='name'>{{ __('Name') }}</x-table-th>
        <x-table-th sortBy='email'>{{ __('Email') }}</x-table-th>
        <x-table-th sortBy='username'>{{ __('Username') }}</x-table-th>
        <x-table-th sortBy='phone'>{{ __('Phone') }}</x-table-th>
        <x-table-th sortBy='is_active'>{{ __('Active') }}</x-table-th>
        <x-table-th sortBy='updated_at'>{{ __('Last Updated') }}</x-table-th>
        <x-table-th>{{ __('Action') }}</x-table-th>
      </tr>
    </thead>
    <tbody>
      @forelse ($vendors as $vendor)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4">
            {{ $vendor->id }}
          </td>
          <td class="px-6 py-4">
            {{ $vendor->name }}
          </td>
          <td class="px-6 py-4">
            {{ $vendor->email }}
          </td>
          <td class="px-6 py-4">
            {{ $vendor->username }}
          </td>
          <td class="px-6 py-4">
            {{ $vendor->phone }}
          </td>
          <td class="px-6 py-4">
            {{ $vendor->is_active ? __('Yes') : __('No') }}
          </td>
          <td class="px-6 py-4">
            {{ $vendor->updated_at->format('Y-m-d H:i A') }}
          </td>
          <td class="px-6 py-4">
            <div class="flex items-center space-x-1">
              <x-td-action-button href="{{ route('admin.vendors.show', $vendor->id) }}">
                <x-icons.eye class="w-5 h-5" />
              </x-td-action-button>
              {{-- <x-td-action-button href="{{ route('admin.brands.edit', $brand->id) }}">
                <x-icons.pencil class="w-5 h-5" />
              </x-td-action-button>
              <x-td-action-button class="cursor-pointer" @click="show, idToDelete = {{ $brand->id }}">
                <x-icons.trash class="w-5 h-5" />
              </x-td-action-button> --}}
            </div>
          </td>
        </tr>
      @empty
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4 text-center" colspan="6">
            {{ __('No vendors to show') }}
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $vendors->links() }}
</div>
