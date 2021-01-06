<template>
    <div class="p-2 text-xl">
        <div class="m-4">
            <form v-on:submit.prevent="submit" class="w-full max-w">
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-2 py-3 rounded relative text-xs font-bold mb-5 text-center"
                    role="alert" v-show="success">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">The invitation has been sent</span>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2">
                        <input type="hidden" id="userId" name="userId" :value="$page.user.id">
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="firstName">
                                    First Name
                                </label>
                                <input
                                    class="form-control block w-full text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                    id="firstName" type="text"
                                    name="firstNameUser" v-model.trim="$v.firstNameUser.$model"
                                    :class="{'is-invalid': validationStatus($v.firstNameUser)}"
                                    placeholder="First name"/>
                                <span v-if="!$v.firstNameUser.required"
                                      class="invalid-feedback text-red-500 text-xs italic">First name is required</span>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="lastName">
                                    Last Name
                                </label>
                                <input
                                    class="form-control block w-full text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                    id="lastName" type="text"
                                    name="lastNameUser" v-model.trim="$v.lastNameUser.$model"
                                    :class="{'is-invalid': validationStatus($v.lastNameUser)}" placeholder="Last Name"/>
                                <span v-if="!$v.lastNameUser.required"
                                      class="invalid-feedback text-red-500 text-xs italic">Last name is required</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="email">
                                    email
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="email" type="text"
                                    name="emailUser" v-model.trim="$v.emailUser.$model"
                                    :class="{'is-invalid': validationStatus($v.emailUser)}" placeholder="Email"/>
                                <span v-if="!$v.emailUser.required"
                                      class="invalid-feedback text-red-500 text-xs italic">The email is required</span>
                                <span v-if="!$v.emailUser.email" class="invalid-feedback text-red-500 text-xs italic">The email is invalid</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="phone">
                                    phone
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="phone" type="text"
                                    name="phone" v-model.trim="$v.phone.$model"
                                    :class="{'is-invalid': validationStatus($v.phone)}" placeholder="Phone"/>
                                <span v-if="!$v.phone.required" class="invalid-feedback text-red-500 text-xs italic">The phone is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    Purpose of meeting / additional information
                                </label>
                                <textarea type="input" class="form-textarea block w-full" rows="2" id="note" name="note"
                                          v-model="note" placeholder="Enter purpose of the meeting."></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="floor">
                                    floor
                                </label>
                                <input
                                    class="form-control block w-full text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                    id="floor" type="text"
                                    name="floor" v-model.trim="$v.floor.$model"
                                    :class="{'is-invalid': validationStatus($v.floor)}" placeholder="Floor"/>
                                <span v-if="!$v.floor.required" class="invalid-feedback text-red-500 text-xs italic">Floor field is required</span>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="office_id">
                                    office
                                </label>
                                <select class="form-control block w-full text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="office_id"
                                        name="officeId" v-model.trim="$v.office.$model"
                                        :class="{'is-invalid': validationStatus($v.office)}" placeholder="Office">
                                    <option value="">Select an office</option>
                                    <option v-for="office in offices" :value="office.id">
                                        {{office.id}}
                                    </option>
                                </select>
                                <span v-if="!$v.office.required" class="invalid-feedback text-red-500 text-xs italic">Office field is required</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    Meeting time
                                </label>
                                <div class="block border border-grey-light w-full rounded p-2">
                                    <label class="ml-10" for="dateTime">Select Date:</label>
                                    <input type="datetime-local" id="dateTime" name="dateTime"
                                           v-model.trim="$v.dateTime.$model"
                                           :class="{'is-invalid': validationStatus($v.dateTime)}" @click="checkDate()"/>
                                </div>
                                <span v-if="!$v.dateTime.required" class="invalid-feedback text-red-500 text-xs italic">The datetime field is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-5">
                        <button type="submit"
                                class="font-bold block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white text-s p-3 px-10 rounded">
                            Send
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import {required, email} from 'vuelidate/lib/validators'

    export default {

        data() {
            return {
                offices: null,
                visitor_id: null,
                schedule_id: null,
                QrCodeId: null,
                success: false,
                errors: {},
                firstNameUser: '',
                lastNameUser: '',
                emailUser: '',
                dateTime: '',
                note: '',
                phone: '',
                floor: '',
                office: '',

                employeeId: '',
                firstNameEmployee: '',
                lastNameEmployee: '',
                emailEmployee: '',
                companyIdEmployee: '',
                departmentIdEmployee: '',
            }
        },

        mounted() {
            this.loadOffices();
            // this.checkDate();
        },

        validations: {
            firstNameUser: {required},
            lastNameUser: {required},
            emailUser: {required, email},
            phone: {required},
            floor: {required},
            office: {required},
            dateTime: {required}
        },
        methods: {

            // checkDate: function () {
            //     var today = new Date();
            //     console.log(today);
            //     document.getElementById('dateTime').min = today;
            // },

            sendConfirmationEmail: function () {
                axios.post('/api/send-qr-code/', {
                    QRcodeId: this.QrCodeId,
                    email: this.emailUser,
                    message: this.note,
                    dateTime: this.dateTime,
                    schedule_id: this.schedule_id
                }).then(response => {})
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        }
                        console.log('Error');
                    })
            },

            loadOffices: function () {
                axios.get('/api/offices').then(response => {
                    this.offices = response.data.data;
                    console.log(this.offices);
                })
            },

            validationStatus(validation) {
                return typeof validation != "undefined" ? validation.$error : false;
            },

            submit() {
                this.$v.$touch();
                if (this.$v.$pendding || this.$v.$error) return;

                this.employeeId = document.getElementById("userId").value;
                console.log(this.employeeId);
                //crate the visitor
                axios.post('/api/visitors', {
                    first_name: this.firstNameUser,
                    last_name: this.lastNameUser,
                    email: this.emailUser
                })
                    .then(response => {
                        console.log(response);
                        //get the newly created visitor id
                        this.visitor_id = response.data.data.id;

                        //get the employee
                        axios.get('/api/employees/' + this.employeeId).then(response => {
                            console.log(response);
                            this.companyIdEmployee = response.data.data.company_id;
                            this.departmentIdEmployee = response.data.data.department_id;
                            this.emailEmployee = response.data.data.email;
                            this.firstNameEmployee = response.data.data.first_name;
                            this.lastNameEmployee = response.data.data.last_name;

                            axios.post('/api/schedules', {
                                dateTime: this.dateTime,
                                host_message: this.note,
                                host_id: this.employeeId,
                                visitor_id: this.visitor_id,
                                company_id: this.companyIdEmployee,
                                department_id: this.departmentIdEmployee,
                                office_id: this.office,
                                floor: this.floor,
                                phone: this.phone

                            })
                                .then(response => {
                                    this.schedule_id = response.data.data.id;

                                    console.log(this.dateTime);
                                    console.log(this.note);
                                    console.log(this.employeeId);
                                    console.log(this.companyIdEmployee);
                                    console.log(this.departmentIdEmployee);
                                    console.log(this.office);

                                    axios.post('/api/qrcodes', {
                                        first_name: this.firstNameEmployee,
                                        last_name: this.lastNameEmployee,
                                        email: this.emailEmployee,
                                        floor: this.floor,
                                        office: this.office,
                                        phone: this.phone,
                                        visitor_id: this.visitor_id,
                                        schedule_id: this.schedule_id,
                                    }).then(response => {
                                        this.QrCodeId = response.data.data.id;
                                        console.log(this.QrCodeId);
                                            this.sendConfirmationEmail();
                                            this.visitor_id = null;
                                            this.fields = {};
                                            this.success = true;
                                    })
                                })
                        })
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        }
                        console.log('Error');
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

