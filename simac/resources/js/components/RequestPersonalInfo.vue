<template>
    <!-- component -->
    <div class="flex-grow lg:flex lg:justify-center lg:flex-grow-0">
        <div class="m-4 rounded px-8 pt-6 pb-8 mb-4">
            <div class="pre-register bg-white px-6 py-8 rounded shadow-md text-black">
                <h1 class="mb-8 text-3xl text-center">Request Personal Information</h1>
                <div v-if="firstName == ''">
                    <form v-on:submit.prevent="submit">
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert" v-show="success">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">Check your email for confirmation</span>
                        </div>

                        <label>Your Token Here</label>
                        <input type="text" class="form-control block border border-grey-light w-full p-4 rounded mt-3"
                            name="token" v-model.trim="$v.token.$model"
                            :class="{'is-invalid': validationStatus($v.email)}" placeholder="0210011025475319"/>
                        <div v-if="!$v.token.required" class="invalid-feedback text-red-500 text-xs italic">Token is required</div>
                        
                        <button type="submit"
                                class="block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 mt-4 px-10 rounded">
                            Send
                        </button>
                    </form>
                </div>
                <div v-if="firstName != ''">
                    <h1 class="text-center font-bold mb-4">Information Related to this Email</h1>
                    <div class="p-2">
                        <p class="mb-2">Name: {{this.firstName}} {{this.lastName}}</p>
                        <p class="mb-2">Email: {{this.email}}</p>
                    </div>
                    
                    <div class="overflow-auto h-64">
                        <div v-for="visit in visit_req" :key="visit.id" class="mb-3 shadow-md p-2 hover:bg-red-600 hover:text-white ease-in duration-200 rounded-lg">
                            <span>Start time: {{visit.proposed_start_dateTime}}</span><br />
                            <span>End time: {{visit.proposed_end_dateTime}}</span>
                            <p v-if="visit.note != null">Note: {{visit.note}}</p>
                        </div>
                    </div>

                    <button v-on:click="goBack" class="bg-red-600 p-2 rounded-lg shadow-md text-white mt-2 hover:bg-red-700 ease-in duration-200">Go Back</button>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, email} from 'vuelidate/lib/validators'

    export default {

        data() {
            return {
                errors: {},
                token: '',
                email: '',
                firstName: '',
                lastName: '',
                visitorId: null,
                visit_req: [],
            }
        },

        validations: {
            token: {required},
        },
        methods: {

            validationStatus(validation) {
                return typeof validation != "undefined" ? validation.$error : false;
            },

            submit() {
                this.$v.$touch();
                if (this.$v.$pendding || this.$v.$error) return;

                axios.get('/api/visitors/bytoken/' + this.token)
                     .then(response => {
                         this.email = response.data.email;
                         this.firstName = response.data.first_name;
                         this.lastName = response.data.last_name;
                         this.visitorId = response.data.id;

                         this.getVisitRequests(this.visitorId);
                     })
                     .catch(error => alert("This code does not match our database, please check the code or pre-register first."));
            },
            getVisitRequests(id){
                axios.get('/api/visit-requests/visitorid/' + this.visitorId)
                     .then(response => this.visit_req = response.data)
                     .catch(error => alert("This code does not match our database, please check the code or pre-register first."));
            },
            goBack(){

                this.email = '';
                this.firstName = '';
                this.lastName = '';
                this.visitorId = null;
                this.visit_req = [];

            },
        }
    }
</script>

