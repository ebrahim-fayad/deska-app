
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    @include('Back.layouts.head')
  </head>
  <body class="vertical  dark rtl ">
    <div class="wrapper">
     <!-- nav bar -->
     @include('Back.layouts.nav-bar')
      <!-- side-bar -->
      @include('Back.layouts.side-bar')
      <main role="main" class="main-content">
        @yield('content')
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('Back.layouts.scripts')
  </body>
</html>
