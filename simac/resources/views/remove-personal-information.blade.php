<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                        Remove personal information
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
                    <h1>FAQ: removing information </h1>
                    <div class="w-full h-1 bg-red-700 mt-4"></div>
                </div>
                <div class="mt-4">
                    <ul class="list-none text-lg">
                        <button class="pt-2 pb-2 cursor-pointer" onclick="GdprInfo()">What is GDPR? </button>
                        <button class="pt-2 pb-2 cursor-pointer" onclick="MyRightsInfo()">What are my rights? </button>
                        <button class="pt-2 pb-2 cursor-pointer" onclick="MyDataInfo()">What is saved? </button>
                    </ul>
                </div>
            </div>
            <div class="flex-grow lg:flex lg:justify-center lg:flex-grow-0 lg:w-3/4">
                <div class="bg-white m-4 pt-4 shadow-md rounded lg:w-3/4 lg:m-8">
                    <h1 class="px-8 py-2 text-lg md:text-xl lg:text-2xl"> GRPD removing personal information</h1>
                    <h3 class="px-8 py-2 text-lg md:text-xl lg:text-xl"> 
                        Under Article 17 of the GDPR individuals have the right to have personal data erased. This is also known as the ‘right to be forgotten’. The right is not absolute and only applies in certain circumstances. You can delete all of your information via the button below.
                    </h3>
                    <div class="px-4 py-2 text-md block lg:text-xl">
                        <form action="" method="post">
                            <div class="p-4 flex justify-center">
                                <button class="block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white py-2 px-6 rounded">Remove all my personal information</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </body>
    <script src="{{ mix('js/app.js')}}"></script>
    <script type="text/javascript">
        function GdprInfo(){
            Swal.fire({
              title: 'What is GDPR?',
              text: 'The General Data Protection Regulation (GDPR) is the toughest privacy and security law in the world. Though it was drafted and passed by the European Union (EU), it imposes obligations onto organizations anywhere, so long as they target or collect data related to people in the EU. The regulation was put into effect on May 25, 2018. The GDPR will levy harsh fines against those who violate its privacy and security standards, with penalties reaching into the tens of millions of euros.',
              showCloseButton: true
            })
        }

        function MyRightsInfo(){
            Swal.fire({
              title: 'What are my rights?',
              text: `The GDPR provides the following rights for individuals:` + `
                The right to be informed
                The right of access
                The right to rectification
                The right to erasure
                The right to restrict processing
                The right to data portability
                The right to object
                Rights in relation to automated decision making and profiling.`,
              showCloseButton: true
            })
        }

        function MyDataInfo(){
            Swal.fire({
              title: 'What of my data are you saving?',
              text: `We save the following information about you: 
              username, password (secured, not in plain text), email and companies that you have scheduled meetings for.
              `,
              showCloseButton: true
            })
        }
    </script>
</html>

