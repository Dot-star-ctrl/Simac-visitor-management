<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="../css/app.css" rel="stylesheet">
    </head>
    <body class="g-grey-lighter flex flex-col min-h-screen">
        <nav class="lg:border-solid lg:border-b-2 bg-white lg:border-red-700">
            <div class="flex flex-row p-4">
                <div class="w-1/6 lg:hidden lg:w-0">
                    <img src="images/menu.svg" class="h-5 m-4 ml-2 md:h-8 md:m-3">
                </div>
                <div class="hidden lg:block">
                    <img src="images/simac-logo-png-transparent2.png" class="lg:h-12 mx-4 my-1">
                </div>
                <div class="w-5/6 lg:w-full">
                    <h1 class="text-xl text-center m-3 md:text-3xl lg:text-4xl lg:text-center lg:m-0">
                        Welcome message
                    </h1>
                </div>
                <div class="hidden lg:block">
                    <img src="images/profile.svg" class="lg:h-10 mx-4 my-1 cursor-pointer">
                </div>
            </div>
        </nav>
        <div class="flex">
            <div class="hidden lg:flex lg:flex-col lg:w-1/4 lg:m-8 lg:p-8 bg-white shadow-md rounded">
                <div class="text-2xl w-full">
                    <h1>Available actions</h1>
                    <div class="w-full h-1 bg-red-700 mt-4"></div>
                </div>
                <div class="mt-4">
                    <ul class="list-none text-lg">
                        <li class="pt-2 pb-2 cursor-pointer">Default message</li>
                        <li class="pt-2 pb-2 cursor-pointer">Preset messages</li>
                    </ul>
                </div>
            </div>
            <div class="flex-grow lg:flex lg:justify-center lg:flex-grow-0 lg:w-3/4">
                <div class="bg-white m-4 pt-4 shadow-md rounded lg:w-3/4 lg:m-8">
                    <h1 class="px-8 py-2 text-lg md:text-xl lg:text-2xl">Default welcome message</h1>
                    <div class="px-4 py-2 text-md block lg:text-xl">
                        <form action="" method="post">
                            <div class="flex-col my-4 w-full">
                                <div class="m-4">
                                    <input class="block rounded w-full p-2 border border-grey-light bg-white" type="text" placeholder="Current welcome message">
                                    </input>
                                </div>
                            </div>
                            <div class="p-4 flex justify-center">
                                <button class="block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white py-2 px-6 rounded">Save</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </body>
    <script src="{{ mix('js/app.js')}}"></script>
</html>

