@props(['sortBy'])

@php
  if (isset($sortBy)) {
      $sortAscByThisKey = request('sort_by') && request('sort_by') === $sortBy && request('sort_type') && request('sort_type') === 'asc' ? true : false;
      $sortDescByThisKey = request('sort_by') && request('sort_by') === $sortBy && request('sort_type') && request('sort_type') === 'desc' ? true : false;
  }
@endphp

<th scope="col" class="px-6 py-3">
  <div class="flex items-center">
    {{ $slot }}
    @if (isset($sortBy))
      <form>
        {{-- @if (request('s'))
          <input type="hidden" name="s" value="{{ request('s') }}">
        @endif --}}
        <input type="hidden" name="sort_by" value="{{ $sortBy }}" />
        <input type="hidden" name="sort_type" value="{{ $sortAscByThisKey ? 'desc' : 'asc' }}" />
        <button type="submit" class="flex flex-col items-center space-y-px ms-2">
          <x-icons.sort-desc
            class="w-3 rotate-180 {{ $sortAscByThisKey ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }}" />
          <x-icons.sort-desc
            class="w-3 {{ $sortDescByThisKey ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }}" />
        </button>
      </form>
    @endif
  </div>
</th>
