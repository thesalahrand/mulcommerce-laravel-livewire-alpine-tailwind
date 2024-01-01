@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}>
  {{ $value ?? $slot }}
  @if ($required !== false)
    <x-required-asterisk />
  @endif
</label>
