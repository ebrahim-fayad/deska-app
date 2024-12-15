<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @include('Front.Partials.head')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            @include('Front.Partials.nav-bar')

          @yield('header')
        </div>
        <!-- Navbar & Hero End -->
        @yield('content')


        <!-- Footer Start -->
        @include('Front.Partials.footer')
        <!-- Footer End -->
    </div>

    <!-- JavaScript Libraries -->
   @include('Front.Partials.scripts')
</body>

</html>
