<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="images/png" href="https://dwao.in/images/favicon.ico" />
    <title>@yield('meta_title')</title>
    <meta description="@yield('meta_description')">
    <link rel="canonical" href=" https://dwao.in/insights-and-case-studies/">

    <!-- Styles -->
    <link href="https://dwao.in/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="https://dwao.in/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://dwao.in/css/slick-theme.min.css'>
    <link href="https://dwao.in/css/styles.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/insights-and-case-studies.css" rel="stylesheet">

    <!-- Js -->
    <script src="https://assets.adobedtm.com/21b53c73144b/774144cf1409/launch-ENc6f7fd4a08f6487bb2c0a4472d7d40a7.min.js" async type="text/javascript"></script>
    @stack('styles')
</head>

<body class="has-no-banner">
    <!-- Header -->
    <x-frontend.header />

    @yield('content')

    <!-- Contact Blocks -->
    <div class="connect-to-us">
        <div class="left">
            <h5>Interested in learning more about us?</h5>
            <a href="https://dwao.in/adobe-analytics/">Explore capabilities</a>
        </div>
        <div class="right">
            <h5>Reach out to us so we can guide you</h5>
            <a href="https://dwao.in/contact-us/">Write to us</a>
        </div>
    </div>

    <x-frontend.footer />
    
    <!-- Footer -->
   
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://dwao.in/js/plugins.js"></script>
    <script src="https://dwao.in/js/main.js" type="text/javascript"></script>

    @stack('scripts')

</body>

</html>