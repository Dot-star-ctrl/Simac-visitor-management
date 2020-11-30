<template>
    <div class="p-2 text-xl">
        <h1 class="p-2 text-center text-2xl">Meeting with <span class="text-red-700">{{ visitor.first_name + ' ' + visitor.last_name }}</span></h1>
        <div class="flex p-2 border-b border-gray-200">
            <div class="w-2/5 p-4 text-xl border-r border-gray-200">
                <h1>Start: <span class="text-red-700">{{ proposed_start }}</span></h1>
                <h1>End: <span class="text-red-700">{{ proposed_end }}</span></h1>
            </div>
            <div class="p-4 text-xl w-full">
                <form action="" class="flex justify-between">
                    <input class="text-lg w-2/3 appearance-none border rounded h-12 px-3 text-gray-700 focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Host name">
                    <div class="text-center">
                        <button class="border border-red-700 bg-red-600 rounded text-white p-2 px-4 text-xl">
                            Search
                        </button>
                        <table>
                            <tr></tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="border-b border-gray-200 p-4 py-8 text-2xl">
            <h1>Notes:</h1>
            <div class="rounded overflow-auto h-64 p-2 my-4 text-lg border border-gray-100">
                {{ notes }}
            </div>
        </div>
        <div class="p-8 pb-0 h-32 flex justify-center items-end">
            <button class="mx-12 border border-green-700 bg-green-600 rounded text-white p-2 px-6 text-xl">
                Send
            </button>
            <button class="mx-12 border border-red-700 bg-red-600 rounded text-white p-2 px-4 text-xl">
                Cancel
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['meetingObj'],
        data() {
            return {
                visitor_id: this.meetingObj.visitor_id,
                visitor: {},
                name: this.meetingObj.name,
                company_id: this.meetingObj.company_id,
                department_id: this.meetingObj.department_id,
                notes: this.meetingObj.note,
                proposed_start: this.meetingObj.proposed_start_dateTime,
                proposed_end: this.meetingObj.proposed_end_dateTime,
                host_id: '',
                hosts: [],
            }
        },
        methods: {
            getVisitor() {
                axios.get('/api/visitors/' + this.visitor_id).then(response => {
                    this.visitor = response.data.data;
                })
            },
            getHosts() {
                axios.get('/api/hosts/' + this.host_id).then(response => {
                    console.log(response);
                })
            }
        },
        mounted() {
            this.getVisitor();
            this.getHosts();
        }
    }
</script>