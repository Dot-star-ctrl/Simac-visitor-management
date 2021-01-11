<template>
    <app-layout>
        <div class="flex justify-center mb-4 mt-8">
            <div class="w-3/5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert" v-if="wasDeleted">
                <strong class="font-bold">Deleted!</strong>
                <span class="block sm:inline">Meeting removed</span>
            </div>
            <div class="w-3/5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert" v-else-if="wasSent">
                <strong class="font-bold">Sent!</strong>
                <span class="block sm:inline">Meeting forwarded to {{ host.fname + ' ' + host.lname}}</span>
            </div>
        </div>
        <div class="m-8 flex bg-white overflow-hidden shadow-xl sm:rounded-lg py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-1/3 overflow-auto border-r border-gray-200">
                <h1 class="p-4 text-center text-2xl ">
                    Pending meetings
                </h1>
                <div class="flex justify-center p-2 border-b border-gray-200">
                    <select
                        v-model="key"
                        @change="getMeetings" 
                        class="w-3/5 px-2 py-1 bg-white border-2 border-gray-500 rounded-md">
                        <option value="up">Upcoming</option>
                        <option value="new">Newest</option>
                        <option value="old">Oldest</option>
                    </select>
                </div>
                <div class="p-2 h-xl overflow-y-scroll">
                    <meeting-thumb
                      :class="m.classname"
                      class="cursor-pointer"
                      v-for="m in meetings"
                      :key="m.id"
                      :data="m"
                      @click.native="focusMeeting(m)"
                    />
                    <div v-if="page < lastPage" class="flex justify-center">
                       <button 
                            class="mx-12 border border-red-700 bg-red-600 hover:bg-red-700 rounded text-white p-2 px-4 text-xl"
                            @click="loadMore">
                            Load more
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-2/3">
                <h1 class="p-4 text-center text-2xl border-b border-gray-200">Overview</h1>
                <meeting-overview 
                    v-if="meetings.length > 0" 
                    :key="currMeeting.id" :data="currMeeting"
                    @hostChanged="setHost"
                    @deleted="removeMeeting"
                    @sent="updateMeeting"/>
                <div v-else class="flex-col">
                    <h1 class="p-8 text-center text-2xl">It seems that there are no meeting requests right now</h1>
                    <div class="flex justify-center">
                        <button 
                            class="mx-12 border border-red-700 bg-red-600 rounded text-white p-2 px-4 text-xl"
                            @click="getMeetings">
                            Refresh
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import MeetingThumb from "@/components/MeetingThumb";
    import MeetingOverview from "@/components/MeetingOverview";

    export default {
        components: {
            AppLayout,
            MeetingThumb,
            MeetingOverview,
        },
        data() {
            return {
                meetings: [],
                currMeeting: {},
                wasDeleted: false,
                wasSent: false,
                host: {},
                key: 'up',
                page: 1,
                lastPage: 0,
            };
        },
        methods: {
            async getMeetings() {
                const res = await axios.get('/api/visitrequests', { 
                    params: {
                        page: 1,
                        key: this.key,
                    }
                });

                this.page = 1;
                this.lastPage = res.data.last_page;

                this.meetings = res.data.data;
                this.focusMeeting(this.meetings[0]);
            },
            async loadMore() {
                let res = await axios.get('/api/visitrequests', { 
                    params: {                            
                        page: ++this.page,
                        key: this.key,
                    }
                });
                res = res.data.data;
                
                this.meetings = this.meetings.concat(res);

            },
            setHost(host) {
                this.host = host;
            },
            focusMeeting(m) {
                this.currMeeting.classname = '',
                m.classname = "bg-red-50";

                this.currMeeting = m;
            },
            removeMeeting(id) {
                this.wasDeleted = true;
                setTimeout(() => { this.wasDeleted = false; }, 5000);

                this.meetings = this.meetings.filter(m => m.id != id);

                if (this.meetings.length > 0) { this.focusMeeting(this.meetings[0]); }
            },
            updateMeeting(id) {
                this.wasSent = true;
                setTimeout(() => { this.wasSent = false; }, 5000);

                this.meetings = this.meetings.filter(m => m.id != id);

                if (this.meetings.length > 0) { this.focusMeeting(this.meetings[0]); }
            }
        },
        mounted() {
            this.getMeetings();
        },
    };
</script>


