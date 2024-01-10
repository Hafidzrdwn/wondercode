<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }} - WonderCode</title>


  @include('partials.style')
  @yield('style')
</head>
<body>

  @include('partials.navbar')
  @include('sweetalert::alert')

  @yield('content')

  @include('partials.footer')

  @include('partials.script')
  @yield('script')
  @vite('resources/js/app.js')
</body>
</html>
