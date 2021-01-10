<template>
    <div class="p-2 text-xl">
        <h1 class="p-2 text-center text-2xl">Meeting with <span class="text-red-700">{{ visitor.fname + ' ' + visitor.lname }}</span></h1>
        <h2 class="p-2 text-center text-xl">{{ visitor.email }}</h2>
        <div class="p-4 text-xl border-t border-b border-gray-200">
            <h1>Start: {{ meeting.start }}</h1>
            <h1>End: {{ meeting.end }}</h1>
        </div>
        <div class="flex p-2 border-b border-gray-200">
            <div class="p-4 text-xl w-full">
                <form action="" class="flex justify-center">
                    <select 
                        @change="hostChanged"
                        v-model="host"
                        class="text-lg w-2/3 appearance-none border rounded h-12 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
                        <option :value="{}" selected="selected">Choose host for the meeting</option>
                        <option
                            v-for="host in hosts"
                            :value="host"
                            :key="host.id">
                                {{ host.fname + ' ' + host.lname }}
                            </option>
                    </select>
                </form>
                <div v-if="noHost" class="my-2 text-sm text-red-600 text-center">
                    You have to select a host!
                </div>
            </div>
        </div>
        <div class="border-b border-gray-200 p-4 py-8 text-2xl">
            <h1>Notes:</h1>
            <div class="rounded overflow-auto h-64 p-2 my-4 text-lg border border-gray-100">
                {{ meeting.notes }}
            </div>
        </div>
        <div class="p-8 pb-0 h-32 flex justify-center items-end">
            <button class="mx-12 border border-green-700 bg-green-600 rounded text-white p-2 px-6 text-xl"
            @click="forwardMeeting">
                Forward meeting
            </button>
            <button class="mx-12 border border-red-700 bg-red-600 rounded text-white p-2 px-4 text-xl"
                @click="cancelMeeting">
                Cancel meeting
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                visitor: {
                    id: this.data.id, 
                    fname: this.data.first_name,
                    lname: this.data.last_name,
                    email: this.data.email,
                },
                meeting: {
                    id: this.data.id,
                    start: this.data.proposed_start_dateTime,
                    end: this.data.proposed_end_dateTime,
                    company_id: this.data.company_id,
                    department_id: this.data.department_id,
                    notes: this.data.note,
                    host_id: '',
                },
                host: {},
                hosts: [],
                noHost: false,
            }
        },
        methods: {
            parseDate() {
                let start = new Date(Date.parse(this.meeting.start));
                let end = new Date(Date.parse(this.meeting.end));

                this.meeting.start = start.getHours() + ':' + start.getMinutes() + ' '
                    + start.getDate() + '.' + (start.getMonth() + 1) + '.' + start.getFullYear();

                this.meeting.end = end.getHours() + ':' + end.getMinutes() + ' '
                    + end.getDate() + '.' + (end.getMonth() + 1) + '.' + end.getFullYear();
            },
            getCompanyHosts() {
                const body = {
                    cid: this.meeting.company_id,
                };

                axios.get('/api/hosts', { params: body }).then(response => {
                    for (let i = 0; i < response.data.data.length; i++) {
                        const host = response.data.data[i];

                        this.hosts.push({
                            id: host.id,
                            fname: host.first_name,
                            lname: host.last_name,
                        });
                    }

                });
            },
            hostChanged() {
                this.$emit('hostChanged', this.host);
            },
            forwardMeeting() {
                if (Object.keys(this.host).length != 0) {
                    axios.put('/api/visitrequests/' + this.meeting.id, { id: this.host.id, })
                        .then(response => {
                            if (response.status == 204) {
                                this.$emit('sent', this.meeting.id);
                            }
                        })
                } else {
                    this.noHost = true; 
                    setTimeout(() => { this.noHost = false; }, 5000);
                }
            },
            cancelMeeting() {
                axios.delete('/api/visitrequests/' + this.meeting.id).then(response => {
                    if (response.status == 204) {
                        this.$emit('deleted', this.meeting.id);
                    }
                });
            },
        },
        mounted() {
            this.parseDate();
            this.getCompanyHosts();
        }
    }
</script>