<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

  {{-- Favicon  --}}
  <link rel="apple-touch-icon" sizes="180x180" href="https://laravel.com//img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://laravel.com//img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://laravel.com//img/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="https://laravel.com//img/favicon/safari-pinned-tab.svg" color="#ff2d20">
  <link rel="shortcut icon" href="https://laravel.com//img/favicon/favicon.ico">
  <meta name="msapplication-TileColor" content="#ff2d20">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen flex flex-col sm:justify-center items-center px-2 py-6 bg-gray-100 dark:bg-gray-900">
    <div class="flex items-center space-x-3">
      <x-icons.application-logo class="w-9 h-9 fill-current text-gray-900 dark:text-white" />
      <h1 class="text-xl font-bold text-gray-900 dark:text-white">
        MulCommerce
      </h1>
    </div>
    <div
      class="w-full max-w-md mt-6 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      {{ $slot }}
    </div>
    <div class="w-full max-w-md mt-4 flex justify-between items-center">
      <x-theme-toggler />
      <x-localization />
    </div>
  </div>
</body>

</html>
