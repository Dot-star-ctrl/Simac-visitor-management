<template>
    <!-- component -->
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="pre-register bg-white px-6 py-8 rounded shadow-md text-black">
<!--                <img src="resources/images/simac-logo.png">-->
                <h1 class="mb-8 text-3xl text-center">Pre-registration</h1>
                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="fullname"
                    placeholder="First name" />

                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="fullname"
                    placeholder="Last Name" />

                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="email"
                    placeholder="Email" />

                <select class="block border border-grey-light w-full p-3 rounded mb-4">
                    <option>Select a Department</option>
                    <option>HR</option>
                    <option>QA</option>
                    <option>Board</option>
                </select>

                <label for="start-date">Select Date:</label>
                <input type="date" id="start-date" name="start_date" />

                <select class="block border border-grey-light w-full p-3 rounded mb-4">
                    <option>Select a time slot</option>
                    <option>9:00 - 9:20</option>
                    <option>9:30 - 9:50</option>
                    <option>10:00 - 9:20</option>
                </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>


                <button class="block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Send</button>

                <div class="text-center text-sm text-grey-dark mt-4">
                    By signing up, you agree to the
                    <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                        Terms of Service
                    </a> and
                    <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                        Privacy Policy
                    </a>
                </div>
            </div>

            <div class="text-grey-dark mt-6">
                Already have an account?
                <a class="no-underline border-b border-blue text-blue" href="../login/">
                    Log in
                </a>.
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
