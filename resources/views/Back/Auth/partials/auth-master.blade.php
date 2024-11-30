
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    @include('Back.Auth.partials.auth-head')
  <body class="dark rtl">
    <div class="wrapper vh-100 overflow-hidden">
      <div class="row align-items-center h-100">
       @yield('content')
      </div>
    </div>
   @include('Back.Auth.partials.auth-scripts')
  </body>
</html>
</body>
</html>
