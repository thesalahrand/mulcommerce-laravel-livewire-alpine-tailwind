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

<body class="font-sans antialiased dark:bg-gray-900" x-data="preserveScroll" x-init="goToPrevScrollPosition">
  {{-- <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
      <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    @endif

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>
  </div> --}}

  <x-toast-message />

  @include('layouts.admin.navigation')

  @include('layouts.admin.sidebar')

  <div class="p-4 sm:ml-64 mt-12">
    <div class="pt-4">
      <!-- Page Heading -->
      @if (isset($header))
        <h2 class="font-bold text-xl text-gray-900 dark:text-white leading-tight mb-6">
          {{ $header }}
        </h2>
      @endif

      {{ $slot }}
    </div>
  </div>
</body>

</html>
