<template>
    <div class="flex-grow lg:flex lg:justify-center lg:flex-grow-0"> 
        <div class="m-4 rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="mb-8 text-3xl text-center">Create new user</h1>

            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                 role="alert" v-show="success">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">Check your email for confirmation</span>
            </div>

            <div>
                <input type="text" class="form-control block border border-grey-light w-full p-4 rounded mt-3"
                       name="email" v-model.trim="$v.email.$model"
                       :class="{'is-invalid': validationStatus($v.email)}" placeholder="Email address"/>
                <div v-if="!$v.email.required && $v.email.$dirty" class="invalid-feedback text-red-500 text-xs italic">Email is required</div>
                <div v-else-if="!$v.email.email" class="invalid-feedback text-red-500 text-xs italic">This must be a valid email address</div>

                <input type="text" class="form-control block border border-grey-light w-full p-4 rounded mt-3"
                       name="firstName" v-model.trim="$v.firstName.$model"
                       :class="{'is-invalid': validationStatus($v.firstName)}" placeholder="First name"/>
                <div v-if="!$v.firstName.required && $v.firstName.$dirty" class="invalid-feedback text-red-500 text-xs italic">First name is required</div>

                <input type="text" class="form-control block border border-grey-light w-full p-4 rounded mt-4"
                       name="lastName" v-model.trim="$v.lastName.$model"
                       :class="{'is-invalid': validationStatus($v.lastName)}" placeholder="Last Name"/>
                <div v-if="!$v.lastName.required && $v.lastName.$dirty" class="invalid-feedback text-red-500 text-xs italic">Last name is required</div>


                <input type="password" class="form-control block border border-grey-light w-full p-4 rounded mt-4"
                       name="password" v-model.trim="$v.password.$model"
                       :class="{'is-invalid': validationStatus($v.password)}" placeholder="Password"/>
                <div v-if="!$v.password.required && $v.password.$dirty" class="invalid-feedback text-red-500 text-xs italic">Password is required</div>
                <div v-else-if="!$v.password.minLength" class="invalid-feedback text-red-500 text-xs italic">Password too short</div>
                <div v-else-if="!$v.password.maxLength" class="invalid-feedback text-red-500 text-xs italic">Password too long</div>

                <input type="password" class="form-control block border border-grey-light w-full p-4 rounded mt-4"
                       name="passwordCheck" v-model.trim="$v.passwordCheck.$model"
                       :class="{'is-invalid': validationStatus($v.passwordCheck)}" placeholder="Repeat password"/>
                <div v-if="!$v.passwordCheck.sameAsPassword" class="invalid-feedback text-red-500 text-xs italic">Passwords do not match</div>
            </div>
            
            <button type="submit"
                    class="block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white py-3 mt-4 px-10 rounded"
                    @click="submit($v)">
                Create
            </button>
        </div>
    </div>
</template>

<script>
import {required, email, minLength, maxLength, sameAs} from 'vuelidate/lib/validators';
import axios from 'axios';

export default {
    validations: {
        firstName: {required},
        lastName: {required},
        email: {required, email},
        password: {
            required,
            minLength: minLength(8),
            maxLength: maxLength(64),
        },
        passwordCheck: {
            sameAsPassword: sameAs('password'),
        },
    },
    data() {
        return {
            success: false,
            firstName: '',
            lastName: '',
            email: '',
            password: '',
            passwordCheck: '',
        }
    },
    methods: {
        validationStatus(validation) {
            return typeof validation != "undefined" ? validation.$error : false;
        },
        submit(v) {
            if (!v.$invalid) {
                let user = {
                    firstName: v.firstName.$model,
                    lastName: v.lastName.$model,
                    email: v.email.$model,
                    password: v.password.$model,
                }

                axios.post('/api/users', user).then(response => {                        
                    console.log(response);
                });
            } else {
                console.log('gowno');
            }
        }
    }
}
</script>