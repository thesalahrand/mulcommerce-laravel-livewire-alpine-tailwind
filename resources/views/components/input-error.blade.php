@props(['messages'])

@if ($messages)
  <ul {{ $attributes->merge(['class' => 'mt-2 text-sm text-red-600 dark:text-red-500 space-y-1']) }}>
    @foreach ((array) $messages as $message)
      <li>{{ $message }}</li>
    @endforeach
  </ul>
@endif
