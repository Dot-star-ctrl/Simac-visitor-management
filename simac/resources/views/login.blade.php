<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="css/app.css" rel="stylesheet">
    </head>
    <body class="g-grey-lighter flex flex-col min-h-screen">
        <nav>
            <img src="images/simac-logo-png-transparent2.png" class="h-12 hidden lg:block sm:h-14 md:h-16 lg:h-22 xl:h-22 mx-4 my-1">
        </nav>
        <div id="app">
            <login-screen></login-screen>
        </div>
    </body>
    <script src="{{ mix('js/app.js')}}"></script>
</html>
