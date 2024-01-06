@props(['breadcrumbItems'])

@php
  $classes = auth()->user()->role === 'user' ? 'border-b border-gray-200 dark:border-gray-600' : '-ml-4 mb-2';
@endphp

<nav class="h-12 {{ $classes }}" aria-label="Breadcrumb">
  <div class="h-full max-w-screen-xl mx-auto px-4">
    <ol class="h-full inline-flex space-x-2 md:space-x-2.5 rtl:space-x-reverse">
      @foreach ($breadcrumbItems as $breadcrumbItem)
        <li class="inline-flex items-center">
          @if (!$loop->first)
            <x-icons.chevron-right-icon class="w-3 h-3 me-2 dark:text-white" />
          @endif

          <a href="{{ $breadcrumbItem['link'] }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">

            @if ($loop->first)
              <x-icons.home class="w-3 h-3 me-2 -mt-0.5" />
            @endif
            {{ $breadcrumbItem['text'] }}
          </a>
        </li>
      @endforeach
    </ol>
  </div>
</nav>
