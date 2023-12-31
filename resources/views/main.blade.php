<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
  html {
    scroll-behavior: smooth;
  }
</style>
<body>

  @include('template.navbar')

  @yield('content')





</body>

@include('template.footer')

</html>
