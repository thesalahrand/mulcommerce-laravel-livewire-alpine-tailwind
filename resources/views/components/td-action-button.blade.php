<a {!! $attributes->merge([
    'class' =>
        'text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white',
]) !!}>
  {{ $slot }}
</a>
