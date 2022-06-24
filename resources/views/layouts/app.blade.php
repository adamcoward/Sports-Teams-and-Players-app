<!doctype html>
<html>
<head>
  <title></title>
  @livewireStyles
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  @yield('content')
  @livewireScripts
</body>
</html>
