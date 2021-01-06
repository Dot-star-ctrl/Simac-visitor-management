<template>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div id="content">
                <div class="p-2 text-xl">
                    <div>
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/3">
                                <div class="mx-3">
                                    <div class="w-full px-3">
                                        <img src="http://127.0.0.1:8000/images/simac-logo-png-transparent2.png"
                                             class="w-15 h-15">
                                    </div>
                                </div>
                                <input type="hidden" id="scheduleId" name="scheduleId" :value="$page.schedule">
                            </div>
                            <div class="w-full md:w-1/3">
                                <div class="mx-3">
                                    <div class="w-full px-3 pt-3 text-center">
                                        <label
                                            class="bold block uppercase tracking-wide text-gray-500 text-3xl font-bold">
                                            visitor
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3">
                            </div>
                        </div>
                        <div class="w-full h-1 bg-red-700"></div>

                        <div class="flex flex-wrap mt-5">
                            <div class="w-full md:w-1/2">
                                <div class="flex flex-wrap mx-3 mb-3">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-red-700 text-3xl mb-2">
                                            Name
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="mx-3 mb-3">
                                    <div class="w-full px-3 mb-6 md:mb-0">
                                        <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                            {{first_name + " " + last_name}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-5">
                            <div class="w-full md:w-1/2">
                                <div class="mx-3 mb-3">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-red-700 text-3xl mb-2">
                                            Company
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="mx-3 mb-3">
                                    <div class="w-full px-3 mb-6 md:mb-0">
                                        <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                            {{company_name}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-5">
                            <div class="w-full md:w-1/2">
                                <div class="mx-3 mb-3">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-red-700 text-3xl mb-2">
                                            Department
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="mx-3 mb-3">
                                    <div class="w-full px-3 mb-6 md:mb-0">
                                        <label class="tracking-wide text-gray-500 text-2xl mb-2">
                                            {{department_name}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-5">
                            <div class="w-full md:w-1/2">
                                <div class="mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-red-700 text-3xl mb-2">
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

                        <div class="w-full h-1 bg-red-700"></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="w-full px-5 mt-20">
            <button type="submit"
                    class="font-bold block mx-auto shadow bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white text-s p-3 px-10 rounded"
                    @click="download">
                Print
            </button>
        </div>
    </div>
</template>

<script>
    import jsPDF from 'jspdf'
    import html2canvas from 'html2canvas'

    export default {
        data() {
            return {
                scheduleId: null,
                visitor_id: null,
                first_name: null,
                last_name: null,
                email: null,
                company_name: null,
                department_name: null,
                company_id: null,
                department_id: null,
                dateTime: null,
            }
        },

        mounted() {
            this.loadSchedule();
        },

        methods: {
            loadSchedule: function () {
                this.scheduleId = document.getElementById("scheduleId").value;
                axios.get('/api/schedules/' + this.scheduleId).then(response => {
                    // this. = response.data.data;
                    console.log(response.data.data);

                    this.visitor_id = response.data.data.visitor_id;
                    this.company_id = response.data.data.company_id;
                    this.department_id = response.data.data.department_id;
                    this.dateTime = response.data.data.dateTime;

                    //get the employee
                    axios.get('/api/visitors/' + this.visitor_id).then(response => {
                        this.first_name = response.data.data.first_name;
                        this.last_name = response.data.data.last_name;
                        this.email = response.data.data.email;
                    })

                    axios.get('/api/companies/' + this.company_id).then(response => {
                        this.company_name = response.data.data.name;
                    })

                    axios.get('/api/departments/' + this.department_id).then(response => {
                        this.department_name = response.data.data.department_name;
                    })
                })
            },

            download() {
                const doc = new jsPDF({
                    orientation: "landscape",
                    unit: "in",
                    format: [3.5, 2]
                });
                var element = document.getElementById('content');
                var width = element.style.width;
                var height = element.style.height;

                html2canvas(element).then(canvas => {
                    var image = canvas.toDataURL('image/png');
                    var width = doc.internal.pageSize.getWidth();
                    var height = doc.internal.pageSize.getHeight();
                    doc.addImage(image, 'JPEG', 0, 0, width, height);
                    doc.save('visitor-badge_' + this.visitor_id + '.pdf');
                });
            }
        }
    }
</script>
