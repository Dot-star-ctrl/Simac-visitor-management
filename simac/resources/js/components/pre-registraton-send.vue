<template>
    <!-- component -->
    <div class="flex-grow lg:flex lg:justify-center lg:flex-grow-0">
<!--        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">-->
        <div class="m-4 rounded px-8 pt-6 pb-8 mb-4">
            <div class="pre-register bg-white px-6 py-8 rounded shadow-md text-black">
                <form v-on:submit.prevent="submit">
                    <h1 class="mb-8 text-3xl text-center">Pre-registration</h1>

                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                         role="alert" v-show="success">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">Check your email for confirmation</span>
                    </div>

                    <input type="text" class="form-control block border border-grey-light w-full p-4 rounded mt-3"
                           name="firstName" v-model.trim="$v.firstName.$model"
                           :class="{'is-invalid': validationStatus($v.firstName)}" placeholder="First name"/>
                    <div v-if="!$v.firstName.required" class="invalid-feedback">First name is required</div>

                    <input type="text" class="form-control block border border-grey-light w-full p-4 rounded mt-4"
                           name="lastName" v-model.trim="$v.lastName.$model"
                           :class="{'is-invalid': validationStatus($v.lastName)}" placeholder="Last Name"/>
                    <div v-if="!$v.lastName.required" class="invalid-feedback">Last name is required</div>

                    <input type="text" class="form-control block border border-grey-light w-full p-4 rounded mt-4"
                           name="email" v-model.trim="$v.email.$model"
                           :class="{'is-invalid': validationStatus($v.email)}" placeholder="Email"/>
                    <div v-if="!$v.email.required" class="invalid-feedback">The email is required</div>
                    <div v-if="!$v.email.email" class="invalid-feedback">The email is invalid</div>

                    <select class="block border border-grey-light w-full p-3 rounded mt-4" id="companyId"
                            name="companyId" @change="onChange()" v-model.trim="$v.companyId.$model"
                            :class="{'is-invalid': validationStatus($v.companyId)}">
                        <option value="">Select a company</option>
                        <option v-for="company in companies" :value="company.id">{{company.name}}</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                    <div v-if="!$v.companyId.required" class="invalid-feedback">The company field is required</div>

                    <select class="block border border-grey-light w-full p-3 rounded mt-4" id="department_id"
                            name="departmentId" v-model.trim="$v.departmentId.$model"
                            :class="{'is-invalid': validationStatus($v.departmentId)}">
                        <option value="">Select a department</option>
                        <option v-for="department in departments" :value="department.id">
                            {{department.department_name}}
                        </option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                    <div v-if="!$v.departmentId.required" class="invalid-feedback">The department field is required
                    </div>


                    <div class="block border border-grey-light w-full p-3 rounded mt-4">
                        <label class="pr-20" for="dateTime">Select Date:</label>
                        <input type="datetime-local" id="dateTime" name="dateTime" v-model.trim="$v.dateTime.$model"
                               :class="{'is-invalid': validationStatus($v.dateTime)}"/>
                    </div>
                    <div v-if="!$v.dateTime.required" class="invalid-feedback">The datetime field is required</div>

                    <button type="submit"
                            class="block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 mt-4 px-10 rounded">
                        Send
                    </button>
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
    import {required, email} from 'vuelidate/lib/validators'

    export default {

        data() {
            return {
                companies: null,
                departments: null,
                visitor_id: null,
                success: false,
                errors: {},
                firstName: '',
                lastName: '',
                email: '',
                companyId: '',
                companyName: '',
                departmentId: '',
                departmentName: '',
                note: '',
                startDateTime: '',
                endDateTime: ''
            }
        },

        mounted() {
            this.loadCompanies();
        },

        validations: {
            firstName: {required},
            lastName: {required},
            email: {required, email},
            companyId: {required},
            departmentId: {required},
            startDateTime: {required},
            endDateTime: {required}
        },
        methods: {

            sendConfirmationEmail: function () {
                // axios.get('/api/companies/' + this.companyId).then(response => {
                //     this.companyName = response.data.data.name;
                //
                //     axios.get('/api/departments/' + this.departmentId).then(response => {
                //         this.departmentName = response.data.data.department_name;
                //
                //         axios.post('/api/send/', {
                //             companyName: this.companyName,
                //             departmentName: this.departmentName,
                //             note: this.note,
                //             proposed_start_dateTime: this.startDateTime,
                //             proposed_end_dateTime: this.endDateTime,
                //             email: this.email
                //         }).then(response => {
                //         })
                //     })
                // })
            },

            onChange() {
            },

            validationStatus(validation) {
                return typeof validation != "undefined" ? validation.$error : false;
            },

            submit() {
                this.$v.$touch();
                if (this.$v.$pendding || this.$v.$error) return;

                axios.post('/api/visitors', {first_name: this.firstName, last_name: this.lastName, email: this.email})
                    .then(response => {
                        this.visitor_id = response.data.data.id;

                        axios.post('/api/visitrequests', {
                            visitor_id: this.visitor_id,
                            company_id: this.companyId,
                            department_id: this.departmentId,
                            note: this.note,
                            proposed_start_dateTime: this.startDateTime,
                            proposed_end_dateTime: this.endDateTime
                        })
                            .then(response => {
                                this.sendConfirmationEmail();
                                console.log(this.note);
                                this.visitor_id = null;
                                this.fields = {};
                                this.success = true;
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    this.errors = error.response.data.errors;
                                }
                                console.log('Error');
                            });

                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        }
                        console.log('Error');
                    });
            }
        }
    }
</script>

