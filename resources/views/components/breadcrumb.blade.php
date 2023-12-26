@props(['breadcrumbItems'])

<nav class="h-12 border-b border-gray-200 dark:border-gray-600" aria-label="Breadcrumb">
  <div class="h-full max-w-screen-xl mx-auto px-4">
    <ol class="h-full inline-flex space-x-2 md:space-x-2.5 rtl:space-x-reverse">
      @foreach ($breadcrumbItems as $breadcrumbItem)
        <li class="inline-flex items-center">
          @if (!$loop->first)
            <x-icons.chevron-right-icon class="w-3 h-3 me-2" />
          @endif

          <a href="{{ $breadcrumbItem['link'] }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">

            @if ($loop->first)
              <x-icons.home-icon class="w-3 h-3 me-2 -mt-px" />
            @endif
            {{ $breadcrumbItem['text'] }}
          </a>
        </li>
      @endforeach
    </ol>
  </div>
</nav>
