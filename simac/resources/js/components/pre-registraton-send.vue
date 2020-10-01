<template>
    <!-- component -->
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="pre-register bg-white px-6 py-8 rounded shadow-md text-black">
<!--                <img src="resources/images/simac-logo.png">-->
                <form @submit.prevent="submit">
                <h1 class="mb-8 text-3xl text-center">Pre-registration</h1>

                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" v-show="success">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">Check your email for confirmation QR code</span>
                    </div>

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4 mt-3" name="first_name" v-model="fields.first_name" placeholder="First name" />
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mb-3 rounded relative" role="alert" v-if="errors && errors.first_name">
                        {{errors.first_name[0]}}
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      </span>
                    </div>

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="last_name" v-model="fields.last_name" placeholder="Last Name" />
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mb-3 rounded relative" role="alert" v-if="errors && errors.last_name">
                        {{errors.last_name[0]}}
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      </span>
                    </div>

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="email" v-model="fields.email" placeholder="Email" />
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mb-3 rounded relative" role="alert" v-if="errors && errors.email">
                        {{errors.email[0]}}
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      </span>
                    </div>

                <select class="block border border-grey-light w-full p-3 rounded mb-4">
                    <option>Select a Department</option>
                    <option>HR</option>
                    <option>QA</option>
                    <option>Board</option>
                </select>
                <div class="block border border-grey-light w-full p-3 rounded mb-4">
                <label class="pr-20" for="start-date">Select Date:</label>
                <input type="datetime-local" id="start-date" name="start_date" />
                </div>
<!--                <select class="block border border-grey-light w-full p-3 rounded mb-4">-->
<!--                    <option v-for="timeSlot in timeSlots":value="timeSlot.toString()">{{timeSlot.toString()}}}</option>-->
<!--                </select>-->
<!--                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">-->
<!--                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>-->
<!--                    </div>-->


                <button type="submit" class="block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Send</button>
                </form>
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
        data(){
            return{
                timeSlots: null,
                fields: {},
                success: false,
                errors: {}
            }
        },
        mounted() {
            axios.get('/api/visitors').then(response => {
                this.timeSlots = response.data.data;
            })
        },
        methods: {
            submit() {
                console.log(this.fields);
                axios.post('/api/visitors', this.fields).then(response => {
                    this.fields ={};
                    this.success = true;
                }).catch(error => {
                    if (error.response.status == 422){
                        this.errors = error.response.data.errors;
                    }
                    console.log('Error');
                });
            }
        }
    }
</script>
