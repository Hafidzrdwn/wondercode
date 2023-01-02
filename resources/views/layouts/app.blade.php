<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }} - WonderCode</title>


  @include('partials.style')
  @yield('style')
</head>
<body>

  @include('partials.navbar')

  @yield('content')

  @include('partials.script')
  @yield('script')
</body>
</html>