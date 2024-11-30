      @php
        $dir = LaravelLocalization::getCurrentLocale() == 'ar' ? 'back-assets-rtl' : 'back-assets';
    @endphp
    <title>{{ $title }}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset($dir) }}/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="c{{ asset($dir) }}/ss/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset($dir) }}/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset($dir) }}/css/app-dark.css" id="darkTheme">
  </head>
