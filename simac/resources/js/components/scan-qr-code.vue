<template>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-2 text-xl">
                <div v-if="scheduleId === null">
                    <div class="w-full px-3 pt-3 text-center">
                        <label class="bold block uppercase tracking-wide text-gray-500 text-xl font-bold pb-3">
                            Scan your QR code
                        </label>
                    </div>

                    <p class="error">{{ error }}</p>
                    <qrcode-stream @decode="onDecode" @init="onInit"/>
                </div>
                <div v-else-if="currentDateTime < timeIntervalUp">
                    <div class="p-2 text-xl">
                        <div>
                            <div class="w-full">
                                <div class="mx-3">
                                    <div class="w-full px-3 pt-3 text-center">
                                        <label
                                            class="bold block uppercase tracking-wide text-gray-500 text-xl font-bold pb-3">
                                            You have checked in successfuly
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3">
                            </div>
                            <div class="w-full h-1 bg-red-700"></div>
                            <div class="flex flex-wrap mt-5">
                                <div class="w-full md:w-1/2">
                                    <div class="flex flex-wrap mx-3 mb-3">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                                The meeting will take place on Floor
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                                {{floor}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                                At office NO.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                                {{office}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                                Person to visit
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                                {{first_name + ' ' + last_name}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                                Meeting time
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-6">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                                {{dateTime}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                                Host email
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                                {{email}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                                Host phone
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <div class="mx-3 mb-3">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                                {{phone}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-5">
                        <button type="button"
                                class="font-bold block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white text-s p-3 px-10 rounded"
                                onclick="location.reload()">
                            Scan another code
                        </button>
                    </div>
                </div>
                <div v-else>
                    <div class="p-2 text-xl text-center">
                        <div>
                            <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">Your are late</label>
                        </div>
                    </div>

                    <div class="flex flex-wrap mt-5">
                        <div class="w-full md:w-1/2">
                            <div class="mx-3 mb-3">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                        Host to visit
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="mx-3 mb-3">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                        {{first_name + ' ' + last_name}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap mt-5">
                        <div class="w-full md:w-1/2">
                            <div class="mx-3 mb-3">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                        Host email
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="mx-3 mb-3">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                        {{email}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap mt-5">
                        <div class="w-full md:w-1/2">
                            <div class="mx-3 mb-3">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-red-700 text-xl mb-2">
                                        Host phone
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="mx-3 mb-3">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                        {{phone}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-5">
                        <button type="button"
                                class="font-bold block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white text-s p-3 px-10 rounded"
                                onclick="location.reload()">
                            Scan another code
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                result: '',
                error: '',

                scheduleId: null,
                qrCodeId: null,
                visitorId: null,
                buildingId: null,
                host_id: null,
                first_name: null,
                last_name: null,
                email: null,
                company_name: null,
                department_name: null,
                floor: null,
                office: null,
                phone: null,
                company_id: null,
                department_id: null,
                dateTime: null,
                currentDateTime: null,
                timeIntervalUp: null,
                checkins: null
            }
        },

        methods: {

            onDecode(result) {
                this.scheduleId = result.match(/WORK(\d+)/i)[1];
                console.log(this.scheduleId);
                this.loadSchedule();
                this.currentDateTime = new Date();
            },

            async onInit(promise) {
                try {
                    const {
                        imageData,    // raw image data of image/frame
                        content,      // decoded String
                        location      // QR code coordinates
                    } = await promise
                } catch (error) {
                    if (error.name === 'NotAllowedError') {
                        this.error = "ERROR: you need to grant camera access permisson"
                    } else if (error.name === 'NotFoundError') {
                        this.error = "ERROR: no camera on this device"
                    } else if (error.name === 'NotSupportedError') {
                        this.error = "ERROR: secure context required (HTTPS, localhost)"
                    } else if (error.name === 'NotReadableError') {
                        this.error = "ERROR: is the camera already in use?"
                    } else if (error.name === 'OverconstrainedError') {
                        this.error = "ERROR: installed cameras are not suitable"
                    } else if (error.name === 'StreamApiNotSupportedError') {
                        this.error = "ERROR: Stream API is not supported in this browser"
                    }
                }
            },

            loadSchedule: function () {

                axios.get('/api/schedules/' + this.scheduleId).then(response => {
                    console.log(response.data.data);

                    this.host_id = response.data.data.host_id;
                    this.visitorId = response.data.data.visitor_id;
                    this.company_id = response.data.data.company_id;
                    this.department_id = response.data.data.department_id;
                    this.dateTime = response.data.data.dateTime;
                    this.floor = response.data.data.floor;
                    this.office = response.data.data.office_id;
                    this.phone = response.data.data.phone;

                    this.timeIntervalUp = new Date();
                    this.timeIntervalUp.setTime(new Date(this.dateTime).getTime() + (15 * 60 * 1000));
                    console.log(this.currentDateTime);
                    console.log(this.timeIntervalUp);
                    console.log(new Date(this.dateTime));

                    //get the employee
                    axios.get('/api/employees/' + this.host_id).then(response => {
                        this.first_name = response.data.data.first_name;
                        this.last_name = response.data.data.last_name;
                        this.email = response.data.data.email;
                    })

                    axios.get('/api/companies/' + this.company_id).then(response => {
                        this.company_name = response.data.data.name;
                    })

                    axios.get('/api/departments/' + this.department_id).then(response => {
                        this.department_name = response.data.data.department_name;
                        this.buildingId = response.data.data.building_id
                    })

                    axios.get('/api/checkin/').then(response => {
                        this.checkins = response.data.data;
                        var exists = false;

                        for (var i = 0; i < this.checkins.length; i++) {
                            if (this.checkins[i].dateTime === this.dateTime || this.checkins[i].visitor_id === this.visitorId || this.checkins[i].building_id === this.buildingId) {
                                exists = true;
                            }
                        }

                        if (!exists) {
                            axios.post('/api/checkin', {
                                dateTime: this.dateTime,
                                visitor_id: this.visitorId,
                                building_id: this.buildingId
                            }).then(response => {
                                exists = false;
                            })
                        }
                    })
                })
            },
        }
    }
</script>

<style scoped>
    .error {
        font-weight: bold;
        color: red;
    }
</style>
