<template>
    <!-- component -->
    <div class="flex-grow lg:flex lg:justify-center lg:flex-grow-0">
        <div class="bg-white m-4 shadow-md rounded px-8 pt-6 pb-8 mb-4 lg:w-1/2 lg:m-8">
            <div class="pt-4">
                <h1 class="text-4xl lg:text-4xl text-center">Log in</h1>
            </div>
            <div class="px-4 py-2 text-xl block lg:text-xl" id="inputs">
                <form action="" method="post">
                    <div class="flex justify-center my-4">
                        <div>
                            <p>Email address</p>
                            <input
                                type="text"
                                class="block border border-grey-light p-2 rounded text-sm w-64"
                                name="email"
                                placeholder="Email"
                                v-model.trim="email" />
                                <div class="text-sm text-red-700" v-if='emEmpty'>
                                      *This field is required.
                                </div>
                        </div>
                    </div>
                    <div class="flex justify-center my-4">
                        <div>
                            <p>Password</p>
                            <input
                                type="password"
                                class="block border border-grey-light p-2 rounded text-sm w-64"
                                name="password"
                                placeholder="Password"
                                v-model.trim="pwd" />
                                <div class="text-sm text-red-700" v-if='pwdEmpty'>
                                      *This field is required.
                                </div>
                            <p class="text-sm text-gray-600 py-2 cursor-pointer">Did you forget your password?</p>
                        </div>
                    </div>
                    <div class="p-4 flex justify-center">
                        <button class="block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white py-2 px-6 rounded" 
                            @click.prevent="submit">Log in</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Login component mounted.')
        },
        data() {
            return {
                email: '',
                pwd: '',
                emEmpty: false,
                pwdEmpty: false,
            }
        },
        methods: {
            submit: function() {
                if (this.email === '') 
                    this.emEmpty = true
                else
                    this.emEmpty = false

                if (this.pwd === '')
                    this.pwdEmpty = true;
                else
                    this.pwdEmpty = false

                if (this.email !== '' && this.pwd !== '') 
                    window.location.href = 'http://127.0.0.1:8000/manportal'
            }
        }
    }
</script>